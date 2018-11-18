<HTML dir="rtl">
<HEAD>
    <TITLE> Add/Remove dynamic rows in HTML table </TITLE>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

    <SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[1].cells.length;

            for(var i=0; i<colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }

        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }


            }
            }catch(e) {
                alert(e);
            }
        }

    </SCRIPT>
</HEAD>
<form name="le_form" action="add" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<center>
    <BODY>

        <INPUT type="button" value="اضاقه کردن رکورد" onclick="addRow('dataTable')" />

        <INPUT type="button" value="حذف رکورد" onclick="deleteRow('dataTable')" />

        <INPUT type="submit" value="ارسال" />
        <p>
        
        <TABLE id="dataTable" width="350px" border="1">
            <TR>
                <TH> </TH>
                <TH> نام </TH>
                <TH> نوع </TH>
                <TH> فایل </TH>
            </TR>
            <TR border-collapse:separate border-spacing:"5px">
                <TD><INPUT type="checkbox" name="chk[]"/></TD>
                <TD><INPUT type="text" name="txt[]"/></TD>
                <TD>
                    <SELECT name="doc_type[]">
                        <OPTION value="meli">کد ملی</OPTION>
                        <OPTION value="shenasname">شناسنامه</OPTION>
                        <OPTION value="doc1">مدرک 1</OPTION>
                        <OPTION value="doc2">مدرک 2</OPTION>
                        <OPTION value="doc3">مدرک 3</OPTION>
                    </SELECT>
                </TD>
               <TD> <input type="file" name="import_file[]" /></TD>
            </TR>
</TABLE>
<br>
@yield('content')	
    </BODY>
    </center>
</form>
</HTML>
