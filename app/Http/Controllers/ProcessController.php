<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProcessController extends Controller
{
    public function processFile(Request $request): RedirectResponse | BinaryFileResponse
    {

        // Valida que el archivo sea un archivo HTML
        $request->validate([
            'fileHtml' => 'required_without:summernote|mimes:html,htm',
            'summernote' => 'required_without:fileHtml',
        ]);

        // El contenido HTML que deseas convertir
        if($request->hasFile('fileHtml')) {
            $file = $request->file('fileHtml');
            $htmlContent = file_get_contents($file->getRealPath());
        }

        if($request->has('summernote')) {
            $htmlContent = $request->input('summernote');
        }

        // Crea un nuevo documento de PHPWord
        $phpWord = new PhpWord();

        // Añade una sección al documento
        $section = $phpWord->addSection();

        // Añade el contenido HTML al documento
        try {
            Html::addHtml($section, $htmlContent, false, false);
        } catch (\Exception $e) {
            return back()->with('danger', 'El contenido HTML no es válido.');
        }

        // Guarda el documento como RTF
        $fileName = date('dHis') . '.rtf';
        $tempFilePath = storage_path($fileName);
        $writer = IOFactory::createWriter($phpWord, 'RTF');
        $writer->save($tempFilePath);

        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }
}
