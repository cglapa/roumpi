<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Fichier de configuration manquant.</title>
		
		<style>
body {
    background: #f4f8fa;
    
    font: 13px/22px "Helvetica Neue", sans-serif;
    color: #6c7f85;
    text-shadow: 0 1px 0 #fff;
    
    width: 720px;
    margin: 50px auto 40px;
}

h1 {
    text-align: center;
    margin-bottom: 60px;
}

h2 {
    font-size: 32px;
    font-weight: 300;
    color: #57829e;
}

a {
	color: #57829e;
}

.content {
    padding: 20px 40px;
    
    background: #fff;
    box-shadow: 0 1px 1px #c8d3da, inset 0 -2px 1px #f6f9fb;
    border-radius: 4px;
}

small {
    font-size: 11px;
    line-height: 18px;
    
    display: block;
    padding: 8px 12px;
    
    background: #ffe;
    color: #775;
    border: 1px solid #eed;
    border-radius: 3px;
}

p.error, p.success {
	color: #fff;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	text-align: center;
	padding: 10px;

	border-radius: 3px;
}

p.error {
	background: #900;
}
    
p.success {
	background: #757e0e;
}
    
    
form {
    overflow: hidden;
    width: 720px;
}

fieldset {
    border: 1px solid #d5e4eb;
    border-radius: 3px;
    
    margin: 30px 36px 30px 0;
    padding: 5px 25px;
    
    float: left;
    overflow: hidden;
    position: relative;
    
    width: 250px;
}
    legend {
        font-weight: bold;
    }
    
    label {
        display: block;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
    }
    
    input, textarea {
        font: 13px "Helvetica Neue", sans-serif;
        padding: 5px 8px;
        width: 230px;
    }
        textarea {
            min-height: 70px;
            max-height: 250px;
            resize: vertical;
        }
    select {
        width: 245px;
        padding: 4px 8px;
    }
    
button, .button {
    font: bold 13px "Helvetica Neue", sans-serif;
    color: #fff;
    text-shadow: 0 1px 1px rgba(0,0,0,.3);
    text-decoration: none;
    
    display: block;
    width: auto;
    float: right;
    cursor: pointer;
    
    margin-bottom: 20px;
    padding: 6px 9px;
    
    border: 1px solid #2f4a57;
    border-radius: 3px;
    
    background-color: #587786;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#6c8894), to(#486472));
    background-image: -webkit-linear-gradient(top, #6c8894, #486472);
    background-image: -moz-linear-gradient(top, #6c8894, #486472);
    background-image: -o-linear-gradient(top, #6c8894, #486472);
    background-image: -ms-linear-gradient(top, #6c8894, #486472);
    background-image: linear-gradient(top, #6c8894, #486472);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#6c8894', EndColorStr='#486472');
    
    box-shadow: inset 0 1px 0 rgba(255,255,255,.15), 0 1px 1px rgba(0,0,0,.05);
}

    form > button, form > p {
        margin-right: 75px;
    }

    button:hover, .button:hover {
        opacity: .9;
    }
    button:active, .button:active {
        opacity: 1;
        
        background-color: #3a5968;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#365361), to(#587684));
        background-image: -webkit-linear-gradient(top, #365361, #587684);
        background-image: -moz-linear-gradient(top, #365361, #587684);
        background-image: -o-linear-gradient(top, #365361, #587684);
        background-image: -ms-linear-gradient(top, #365361, #587684);
        background-image: linear-gradient(top, #365361, #587684);
        filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#365361', EndColorStr='#587684');
        
        box-shadow: inset 0 1px 1px rgba(0,0,0,.15), 0 -1px 1px rgba(0,0,0,.1);
        
        border-color: #192e39;
    }
    
p.footer {
    font-size: 12px;
    text-align: center;
    
    padding-top: 40px;
}
    p.footer a {
        color: #587684;
    }
		</style>
	</head>
	<body>
    	<h1><img src="./system/admin/theme/assets/img/logo.png" alt="Logo de Roumpi"></h1>
    	<div class="content">
    		<h2>Ouups !</h2>

		<p>Il semble que le fichier de configuration manque ou alors n’est pas lisible.</p>

    		<p><a href="./install" class="button" style="float: none; display: inline-block;">Lancer l’installeur</a></p>
    	</div>
	</body>
</html>
