{{> headerMap}}

<div class="container pt-5 my-3 border">
<h2 class="text-center">Crear Noticia</h2>

<form method="POST" enctype="multipart/form-data" action="/noticia/validar">

    <!--<label>Ejemplar:</label>
    <select class="form-control mb-5" name="categoria">
        {{#ejemplar}}
        <option value="{{id}}">{{nombre}}</option>
        {{/ejemplar}}
    </select>-->

    <div class="form-group">
        <label>Titulo:</label>
        <input type="text" name="titulo" id="" placeholder="Titulo" class="form-control" required>
    </div>


    <div class="form-group">
        <label>Subtitulo:</label>
        <input type="text" name="subtitulo" id="" placeholder="Subtitulo" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Contenido:</label>
        <textarea type="text" name="contenido" id="" placeholder="Contenido" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>Ubicacion:</label>
        <input class="form-control" type="text" name="ubicacion" value="Ingrese ubicacion en la lupa del mapa" placeholder="Olé" class="form-control" required readonly>
    </div>
    <div id="map"></div>

    <div class="form-group">
        <label>Link de :</label>
        <input type="text" name="link" id="" placeholder="www.f.com" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Video:</label>
        <input type="text" name="video"  placeholder="Olé" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Precio:</label>
        <input type="number" name="precio" min="0" placeholder="54.99" class="form-control"  step="0.01" required>
    </div>


    <div class="col clearfix">
        <input type="submit" value="Aceptar" class="btn btn-info float-right">
        <a class="btn btn-info" href="/usuario/login">Atrás</a>
    </div>
    {{#id}}
        <input type="hidden" name="seccion" value={{id}}>
    {{/id}}

    {{#id_edicion}}
        <input type="hidden" name="id_edicion" value="{{id_edicion}}">
    {{/id_edicion}}

    <script>
        const cordsRecomida={
            latitude:-34.668680,
            longitude:-58.566209
        };

        var mymap = L.map('map').setView([cordsRecomida.latitude,cordsRecomida.longitude],1);

        var searchControl = L.esri.Geocoding.geosearch().addTo(mymap);

        var marker = L.marker([cordsRecomida.latitude,cordsRecomida.longitude]).addTo(mymap);

        marker.bindPopup("<b>Infonete!</b><br>San justo.").openPopup();

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyY29zY2FicmFsIiwiYSI6ImNrYmVoZGEydjBsamUyb253bThiOHZtMG8ifQ.snZzmGQRneUicIBvZyzBmw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWFyY29zY2FicmFsIiwiYSI6ImNrYmVoZGEydjBsamUyb253bThiOHZtMG8ifQ.snZzmGQRneUicIBvZyzBmw'
        }).addTo(mymap);




        var results = L.layerGroup().addTo(mymap);

        var coord=[];

        searchControl.on("results", function(data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {

                results.addLayer(L.marker(data.results[0].latlng));

                console.log(data.results[0].text);

                coord[0]=data.latlng.lat;
                coord[1]=data.latlng.lng;

                document.getElementsByName("ubicacion")[0].value = data.results[0].text;

                //document.getElementsByName("latitude")[0].value = coord[0];
                //document.getElementsByName("longitude")[0].value = coord[1];

            }
        });



    </script>
</form>
</div>
{{> footer}}