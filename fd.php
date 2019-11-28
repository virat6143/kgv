<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script type="text/javascript">
        
         $count=1;
          window.onload = function() {
          document.getElementById("txt_usrid").value = $count;
      }
      $count++;
  </script>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <input type="text" tooltip="User Id" id="txt_usrid"/>
        </div>
    </form>
</body>
</html>