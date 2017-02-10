<?php
   include('config.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/General.css"type="text/css"rel="stylesheet"/> 
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <!--inclusion CSSS pour autocompletion-->
    <title>Liste Examens</title>
</head>
    <body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
    <div class="gris">
        
                <div  class="gris2">
         <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris";>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>
                        
            <div id="menu3" class="carreGris" ;>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
             <div id="menu4" class="carreGris" style="background-color:#1270B3"  >
                <h4>Paramètres</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
            <div id="menu5" class="carreGris">
                <h4>Logout</h4>
                <img class="icone_menu" src="Icones/logout.png"/>      
            </div>
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Examens</h1>
                
            </div>
            <script src="js/General.js"></script>
    <div class="blanc";   style="border-radius: 5px;">
        <table cellspacing="0px" id="tbl" class="table" style="margin-top:70px;">  
                        
                        <th>Nom Examen </th>
                        <th>Description </th>
        <?php
            $reponse = $bdd->query('SELECT * FROM Examen');
            while($dnn = $reponse->fetch()){
        ?>
        <tr>
        <td class="left"><?php print_r($dnn['typeExamen']); ?></td>
        <td class="left"> <?php print_r($dnn['details']); ?> </td>
        <td><a href="./Interaction-BDD/SupprBDD_Examen.php?idexamen=<?php echo $dnn['id_examen']; ?>" onclick="return sure();"><img class="supprimer" src="Icones/button_supprimer.png"></a></td> 
        </tr>                
            <?php
                };
            ?>
        <script> 
            function sure()
            {
                return(confirm('Etes-vous sûr de vouloir supprimer ce Service ?'));
            }                 
        </script>                                                                                                                       
        </table>
        <table cellspacing="0px" class="table" style="margin-top:30px;">
            <form action="./Interaction-BDD/AjoutBDD_Examen.php" method="post"></form>
        <tr> 
            <td class="left">Nom de l'examen:</td> 
            <td class="left" > 
                <input type="text" name="type_examen" placeholder="(ex: IRM)"/> 
            </td> 
        </tr> 
        <tr> 
            <td class="left">Description:</td> 
            <td class="left"> 
                <input type="text" name="details_examen" placeholder="(ex: visualiser le cerveau)"/>
            </td> 
        </tr>
        <tr height="60px"> 
                <td align="center" colspan="2"> 
                    <input type="submit" accesskey="enter" value="Ajouter" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/>
                    <input type="button" value="转到登录" onclick="window.location.replace('login.html')" id="btn1" onmousemove="changeBgColor('btn1')" onmouseout="recoverBgColor('btn1')" class="submit" /> 
                </td>
        </tr>
        </table>
              <table cellspacing="0px" class="table" style="margin-top:30px;">
            <form action="./Interaction-BDD/AjoutBDD_Examen.php" method="post"></form>
        <tr> 
            <td class="left">Nom de l'examen:</td> 
            <td class="left" > 
                <input type="text" name="type_examen" placeholder="(ex: IRM)"/> 
            </td> 
        </tr> 
        <tr> 
            <td class="left">Description:</td> 
            <td class="left"> 
                <input type="text" name="details_examen" placeholder="(ex: visualiser le cerveau)"/>
            </td> 
        </tr>
       <table align="center" cellspacing="0" class="table"> 
<tr class="thead"> 
<td align="center"> 
会员注册 
</td> 
</tr> 
<tr> 
<td> 
<table id="registertable" border="0px" align="center" border="0px" cellspacing="0" cellpadding="5px"> 
<tr> 
<tr> 
<td align="right"> 
员工编号： 
</td> 
<td align="left"> 
<input type="text" name="username" placeholder="用户名" required/> 
</td> 
</tr> 
<tr> 
<td align="right"> 
密 码： 
</td> 
<td align="left"> 
<input type="password" name="password" id="password" placeholder="密码" required onkeyup="passwd()"/> 
<meter min="1" max="10" low="5" high="8" value="0" id="meter"> 
</meter> 
<span id="tip"></span> 
</td> 
</tr> 
<tr> 
<td align="right"> 
密码确认： 
</td> 
<td align="left"> 
<input type="password" name="password2" placeholder="确认密码" required/> 
</td> 
</tr> 
<tr> 
<td align="right"> 
生 日： 
</td> 
<td align="left"> 
<input type="date" name="borthday" /> 
</td> 
</tr> 
<tr> 
<td align="right"> 
性 别： 
</td> 
<td align="left"> 
<input type="radio" name="gender" value="0" checked/>男 
<input type="radio" name="gender" value="1"/>女 
</td> 
</tr> 
<tr> 
<td align="right"> 
邮 箱： 
</td> 
<td align="left"> 
<input type="email" name="email" placeholder="邮箱" id="email" required/> 
</td> 
</tr> 
<tr> 
<td align="right"> 
手 机： 
</td> 
<td align="left"> 
<input type="tel" pattern="[0-9]{11}" id="p" name="phone" placeholder="请输入11位数字" /> 
</td> 
</tr> 
<tr> 
<td align="right"> 
地 址： 
</td> 
<td align="left"> 
<input type="text" name="address" placeholder="地址" list="l"/> 
<datalist id="l"> 
<option value="sh">上海</option> 
<option value="bj">北京</option> 
<option value="js">江苏</option> 
<option value="zz">郑州</option> 
<option value="sz">深圳</option> 
</datalist> 
</td> 
</tr> 
<tr> 
<td align="right"> 
个人网页： 
</td> 
<td align="left"> 
<input type="url" name="page" placeholder="主页网址" /> 
</td> 
</tr> 
<tr> 
<td align="right"> 
起床时间： 
</td> 
<td align="left"> 
<input type="time" name="bed" onblur="pro()"/> 
</td> 
</tr> 
<tr> 
<td align="right"> 
头像： 
</td> 
<td align="left"> 
<input type="file" id="f" accept="image/jpeg" onchange="show()"/><span><img id="img" src="" width="60" height="60" /></span> 
<script> 
function show(){ 
var file = document.getElementById("f").files[0]; 
var fileReader = new FileReader(); 
fileReader.readAsDataURL(file); 
fileReader.onload = function(){ 
document.getElementById("img").src = fileReader.result; 
} 
} 
</script> 
</td> 
</tr> 
<tr> 
<td colspan="2"> 
<details> 
<p> 
允许注册 
<mark> 
许可证 
</mark>信息 
</p> 
<summary> 
注册许可信息 
</summary> 
</details> 
</td> 
</tr> 
<tr> 
<td align="right"> 
验证码： 
</td> 
<td valign="middle"> 
<input type="text" name="captcha" size="11" maxlength="4" title="输入右边的验证码" /> 
<span id="span"></span> 
<script> 
var span = document.getElementById("span"); 
span.innerHTML=Math.floor(Math.random()); 
</script> 
</td> 
</tr> 
<tr height="60px"> 
<td align="center" colspan="2"> 
<input type="button" value="转到登录" onclick="window.location.replace('login.html')" id="btn1" onmousemove="changeBgColor('btn1')" onmouseout="recoverBgColor('btn1')" class="submit" /> <input type="submit" accesskey="enter" value="注册" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
</td> 
</tr> 
</table> 
    </div>
    </div>
    </div>
</body>
</html>
        