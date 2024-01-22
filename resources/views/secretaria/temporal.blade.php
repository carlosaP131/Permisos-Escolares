<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Carga los Alumnos desde un archivo Excel</h3>
                        <p>Con extencion "Alumnos.xlsx"</p>
                        <form action="{{ url('datos/importar') }}" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <br />
                                <div class="row">
                                    <div class="clod-md-4"></div>
                                    <div class="clod-md-6">
                                        <div class="row">
                                            @csrf
                                            <div class="clod-md-6">
                                                <input type="file" name="documento">
                                            </div>
                                            <div class="clod-md-6">
                                                <button class="btn btn-primary" type="submit">Importar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
