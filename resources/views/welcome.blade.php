<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container mt-5">
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <div class="alert alert-{{ $key }} alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <p class="mb-0">{{ Session::get($key) }}</p>
                    </div>
                @endif
            @endforeach

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <form method="POST" action="{{route('process.file')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="fileHtml" class="form-label">Archivo html</label>
                    <input type="file" class="form-control" id="fileHtml" name="fileHtml" accept="text/html">
                </div>

                <hr>

                <div class="mb-3">
                    <label for="summernote" class="form-label">Content</label>
                    <textarea class="form-control" id="summernote" name="summernote">
                        <main>
                            <div id="content_all" class="">
                                <div id="content_pdf_table_0">
                                    <div class="table_cabecera">Bazo</div>
                                    <table id="table_pdf_1" class="table_1">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Axial</th>
                                                <th>Sagital</th>
                                                <th>Coronal</th>
                                                <th>Porcentaje</th>
                                                <th>Total (mm3)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="fila_blanca">
                                                <td>15/05/2024</td>
                                                <td>test1</td>
                                                <td>20</td>
                                                <td>test2</td>
                                                <td>10</td>
                                                <td>30</td>
                                            </tr>
                                            <tr class="fila_gris">
                                                <td>14/05/2024</td>
                                                <td>test4</td>
                                                <td>10</td>
                                                <td>test5</td>
                                                <td>20</td>
                                                <td>30</td>
                                            </tr>
                                            <tr class="fila_blanca">
                                                <td>13/05/2024</td>
                                                <td>90</td>
                                                <td>70</td>
                                                <td>80</td>
                                                <td>70</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" class="comments_endtable">
                                                    <p>1 - Todos los volúmenes están presentados en valores absolutos (medidas en mm3) y los
                                                        valores de medición en los planos en milímetros.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="comments_endtable">
                                                    <p>2 - Las medidas de los cortes axial, sagital y coronal se realizan sobre un mismo corte,
                                                        en el centro del volumen anatómico a analizar.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="comments_endtable">
                                                    <p>3 - Porcentaje de variación calculado en base a los volúmenes obtenidos con respecto al
                                                        anterior estudio realizado.</p>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </main>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
</html>
