<!DOCTYPE html>
<html>
<head>
    <title>HECHO  POR DIEGO TOLOZA PRUEBA DE BUSCADOR</title>
    <meta charset="utf-8">
    <script language="javascript">
        function doSearch()
        {
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }
    </script>
 
    <style>
        #datos {border:1px solid #ccc;padding:10px;font-size:1em;}
        #datos tr:nth-child(even) {background:#ccc;}
        #datos td {padding:5px;}
        #datos tr.noSearch {background:White;font-size:0.8em;}
        #datos tr.noSearch td {padding-top:10px;text-align:right;}
        .hide {display:none;}
        .red {color:Red;}
    </style>
</head>
 
<body>
    <h1>HECHO POR DIEGO TOLOZA</h1>
    <p>Contacto:tolozad556@gmail.com</p>
    <form>
        Cadena a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
    <p>
        <table id="datos">
            <tr>
                <th>id</th><th>Nombre</th><th>Apellidos</th><th>G??nero</th><th>Edad</th>
            </tr>
            <tr>
                <td>20</td><td>Adrian</td><td>Ramos</td><td>M</td><td>36</td>
            </tr>
            <tr>
                <td>10</td><td>Lionel</td><td>Messi</td><td>M</td><td>34</td>
            </tr>
            <tr>
                <td>11</td><td>Lucas </td><td>paqueta</td><td>M</td><td>26</td>
            </tr>
            <tr>
                <td>12</td><td>Dani</td><td>alves</td><td>M</td><td>38</td>
            </tr>
            <tr class='noSearch hide'>
                <td colspan="5"></td>
            </tr>
        </table>
    </p>
</body>
</html>


         

</html>