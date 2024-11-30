<?php
if (isset($_GET['view'])) {
    $archivo = $_GET['view'];
} else {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <script src="pdf-js/pdf.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #171725;
        }

        .top-bar {
            background: #171725;
            color: #fff;
            padding: 1rem;
            display: none;
        }

        .btn {
            background: coral;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 0.7rem 2rem;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error {
            background: orangered;
            color: #fff;
            padding: 1rem;
            margin-top: 50vh;
        }

        #pdf-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        #canvas-container {
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #pdf_canvas {
            max-width: 100%;
            height: auto;
        }

        .page-info {
            text-align: center;
            margin-top: 10px;
        }

        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #429867;
            color: #fff;
            padding: 1rem;
            border-radius: 5px;
            display: none;
        }

        @media (max-width: 768px) {
            #pdf-container {
                height: 100vh;
                justify-content: space-evenly;
            }

            #canvas-container {
                align-items: center;
                margin-bottom: 0px;
            }

            #zoomIn,
            #zoomOut {
                display: none;
            }
        }
    </style>

    <style>
        /* From Uiverse.io by zanina-yassine */
        .container {
            width: 100px;
            height: 125px;
            margin: auto auto;
            position: absolute;
            top: 50%;
        }

        .loading-title {
            display: block;
            text-align: center;
            font-size: 20;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
            padding-bottom: 15px;
            color: #888;
        }

        .loading-circle {
            display: block;
            border-left: 5px solid;
            border-top-left-radius: 100%;
            border-top: 5px solid;
            margin: 5px;
            animation-name: Loader_611;
            animation-duration: 1500ms;
            animation-timing-function: linear;
            animation-delay: 0s;
            animation-iteration-count: infinite;
            animation-direction: normal;
            animation-fill-mode: forwards;
        }

        .sp1 {
            border-left-color: #F44336;
            border-top-color: #F44336;
            width: 40px;
            height: 40px;
        }

        .sp2 {
            border-left-color: #FFC107;
            border-top-color: #FFC107;
            width: 30px;
            height: 30px;
        }

        .sp3 {
            width: 20px;
            height: 20px;
            border-left-color: #8bc34a;
            border-top-color: #8bc34a;
        }

        @keyframes Loader_611 {
            0% {
                transform: rotate(0deg);
                transform-origin: right bottom;
            }

            25% {
                transform: rotate(90deg);
                transform-origin: right bottom;
            }

            50% {
                transform: rotate(180deg);
                transform-origin: right bottom;
            }

            75% {
                transform: rotate(270deg);
                transform-origin: right bottom;
            }

            100% {
                transform: rotate(360deg);
                transform-origin: right bottom;
            }
        }
    </style>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
</head>

<body>
    <div id="pdf-container">
        <!-- <div class="loading" id="loading-message">Cargando PDF...</div> -->
        <div class="container" id="loading-message">
            <label class="loading-title">Cargando ...</label>
            <span class="loading-circle sp1">
                <span class="loading-circle sp2">
                    <span class="loading-circle sp3"></span>
                </span>
            </span>
        </div>
        <div class="top-bar" id="top-bar">
            <div class="container-btn">
                <button class="btn" id="prev">
                    <i class="fas fa-arrow-circle-left"></i> Anterior
                </button>
                <button class="btn" id="next">
                    Siguiente <i class="fas fa-arrow-circle-right"></i>
                </button>
                <button id="zoomOut" class="btn"><i class="fas fa-search-minus"></i></button>
                <button id="zoomIn" class="btn"><i class="fas fa-search-plus"></i></button>
            </div>
            <div class="page-info">
                Página <span id="page_num"></span> de <span id="page_count"></span>
            </div>
        </div>

        <div id="canvas-container">
            <canvas id="pdf_canvas"></canvas>
        </div>
        
    </div>

    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf-js/pdf.worker.min.js';

        var archivoPDF = "<?php echo $archivo; ?>";
        var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = window.innerWidth < 768 ? 1.0 : 0.8;
        canvas = document.getElementById("pdf_canvas"),
            ctx = canvas.getContext('2d');

        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then((page) => {
                var viewport = page.getViewport({
                    scale: scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(() => {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
            document.getElementById('page_num').textContent = num;
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }
        document.getElementById('prev').addEventListener('click', onPrevPage);

        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }
        document.getElementById('next').addEventListener('click', onNextPage);

        function zoomOut() {
            scale -= 0.1;
            renderPage(pageNum);
        }
        document.getElementById("zoomOut").addEventListener('click', zoomOut);

        function zoomIn() {
            scale += 0.1;
            renderPage(pageNum);
        }
        document.getElementById('zoomIn').addEventListener('click', zoomIn);

        document.getElementById('loading-message').style.display = 'block';

        pdfjsLib.getDocument('../docs/' + archivoPDF + '.pdf').promise.then((doc) => {
            pdfDoc = doc;
            document.getElementById('page_count').textContent = doc.numPages;
            renderPage(pageNum);

            document.getElementById('loading-message').style.display = 'none';

            document.getElementById('top-bar').style.display = 'block';
        }).catch((error) => {
            console.error('Error al cargar el documento: ' + error);
            document.getElementById('pdf-container').innerHTML = '<div class="error">No se pudo cargar el PDF.</div>';
        });
    </script>
    <script>
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    </script>
</body>

</html>