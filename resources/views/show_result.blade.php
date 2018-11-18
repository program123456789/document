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
</HEAD>
<form name="le_form" action="show" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<center>
    <BODY>
        <INPUT type="submit" value="ارسال" />
        <p>
        
        <TABLE id="dataTable" width="350px" border="1">
            <TR>
                <TH> نام </TH>
                <TH> نوع </TH>
                <TH> نام فایل </TH>
            </TR>
            <TR border-collapse:separate border-spacing:"5px">
                <TD><INPUT type="text" name="txt"/></TD>
                <TD>
                    <SELECT name="doc_type">
                        <OPTION value=""> - </OPTION>
                        <OPTION value="meli">کد ملی</OPTION>
                        <OPTION value="shenasname">شناسنامه</OPTION>
                        <OPTION value="doc1">مدرک 1</OPTION>
                        <OPTION value="doc2">مدرک 2</OPTION>
                        <OPTION value="doc3">مدرک 3</OPTION>
                    </SELECT>
                </TD>
               <TD> <input type="text" name="file_name" /></TD>
            </TR>
</TABLE>
    </BODY>
    @yield('content');
    </center>
</form>
</HTML>
