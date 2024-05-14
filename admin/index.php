<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Pollination - Inscrição</title>
    <link rel="shortcut icon" href="../assets/img/fv.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
            
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 100%;
        min-height: 100vh;
        font-family: 'Roboto', sans-serif;
        background-color: #f5f8fa;
    }

    form {
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 48px;
        margin-top: 2rem;
        width: 600px;
        background-color: #fff;
        border-radius: 4px;
        box-shadow:0 .1rem 1rem .25rem #0000000d!important;;
    }

    label {
        display: flex;
        margin-top: 1.2rem;
        margin-bottom: 0.3rem;
        font-size: 0.7rem;
        letter-spacing: 0.5px;
        font-weight:bold;
        color: rgb(16 47 68);
    }

    input,select {
        width: 100%;
        background-color: #f5f8fa;
        border: none;
        border-radius: 6px;
        padding: 15px 20px;
    }


    .appform-button {
        margin-top: 2rem;
        width: 100%;
        height: 3rem;
        text-transform: capitalize;
        font-size: 0.9rem;
        font-family: 'Roboto', sans-serif;
        color: rgb(220, 229, 247);
        background-color: #9f84f8;
        border-radius: 4px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        color: black;
    }

    .form-group{
        display: flex;
        gap: 10px;
    }
    .form-group div{
        width: 100%;
    }
    span {
        font-size: 0.7rem;
        color: rgb(37, 99, 235);
    }

    .error{
        color: rgba(233, 31, 31, 0.906);
        font-weight: bold;
    }

    @media (max-width: 768px){
        section{
            padding: 0 10px !important;
        }
        form{
            width: 100%;
        }
        .form-group{
            display: flex;
            flex-direction: column;
        }
    }
    .alert{
        width: 300px;
        text-align: center;
        display: none;
    }
    .alert button {
        border: none;
        background: transparent;
    }
    .logo{
        text-align: center;
    }
</style>
</head>
<body>
    
<div class="alert alert-danger"  role="alert">
           E-mail/Senha inválido.
           <button  onclick="closeButton()">X</button>
    </div>
     <section>
            <div class="logo">
                <img src="../assets/img/saas-c/logo/logo.png" alt="">
            </div>
            <form id="loginForm">
                <label for="username">EMAIL</label>
                <input type="email" name="email" id="email" required />
               
                <label for="password">SENHA</label>
                <input type="password"  name="senha" id="senha" required  />
                <input type="submit"  class="appform-button" value="Entrar" />
            </form>
        </section>
       
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/js/validate/jquery.validate.min.js"></script>
<script src="../assets/js/validate/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

<script src="../assets/js/login.js"></script>
</html>