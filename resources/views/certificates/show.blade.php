<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Certificado {{$certificate->model->firstname}} {{$certificate->model->lastname}} | PERU SOBRE RIELES 2021 </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
</head>
<style>

    @page {
        margin: 0px 0px 0px 0px !important;
        padding: 0px 0px 0px 0px !important;
    }

    #pagina {
        position: relative;
        background-image: url(https://perusobrerieles.com/img/certificado-peru-sobrerieblesv2.png);
        /*750x609px*/
        margin: auto;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        z-index: 0;
        overflow: hidden;
    }
    .otorga{
        position: absolute;
        left: 90%;
        top: 40%;
        transform: translate(-50%, -50%);
        font-size: 1rem;
        font-weight: 400;
        font-family: 'Roboto',sans-serif;
        width: 90%;
        margin: 0 auto;
    }
    .identificacion{
        position: absolute;
        left: 0%;
        top: 51%;
        font-size: 1rem;
        font-weight: 400;
        font-family: 'Roboto',sans-serif;
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }
    .capacitacion{
        position: absolute;
        left: 0%;
        top: 54%;
        font-size: 1.2rem;
        font-family: 'Roboto',sans-serif;
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }
    .curso{
        position: relative;
        left: 0%;
        top: 54%;
        font-size: 1.6rem;
        font-weight: 500;
        font-family: 'Roboto',sans-serif;
        width: 80%;
        margin: 0 auto;
        text-align: center;
        line-height: 1.1rem;
    }
    .fecha{
        position: absolute;
        right: 4%;
        top: 67%;
        font-size: 1.2rem;

        font-family: 'Roboto',sans-serif;
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }
    .duracion{
        position: absolute;
        right: 4%;
        top: 70%;
        font-size: 1.2rem;
        font-family: 'Roboto',sans-serif;
        width: 100%;
        text-align: center;
        margin: 0 auto;

    }
    .participante{
        position: relative;
        top: 49%;
        font-size: 2rem;
        font-weight: 400;
        font-family: 'Roboto',sans-serif;
        width: 60%;
        text-align: center;
        text-transform: uppercase;
        margin: 0 auto;
    }
    .firma_david{
        position: relative;
        width: 100%;
        left: 8%;
    }
    .firma_trainer{
        position: relative;
        width: 100%;
    }

    .firma_david img{
        position: absolute;
        right: 35%;
        top: 79%;
        font-family: 'Roboto',sans-serif;
    }

    .firma_trainer img{
        position: absolute;
        left: 24%;
        top: 75%;
    }

    .firma_david .name{
        position: absolute;
        right: 26%;
        top: 86%;
        font-family: 'Roboto',sans-serif;
        border-top: 2px solid #1cb7ff;
    }

    .firma_trainer .name{
        position: absolute;
        left: 14%;
        top: 86%;
        font-family: 'Roboto',sans-serif;
        border-top:2px solid #1cb7ff;
    }


    .firma_david .cargo{
        position: absolute;
        right: 27.5%;
        top: 90%;
        font-size: .9rem;
        font-weight: 400;
        font-family: 'Roboto',sans-serif;
    }

    .firma_trainer .cargo{
        position: absolute;
        left: 15%;
        top: 90%;
        font-size: .9rem;
        font-weight: 400;
        font-family: 'Roboto',sans-serif;
    }
    .firma_david .extra{
        position: absolute;
        right:30%;
        top: 92%;
        font-weight: 400;
        font-size: .9rem;
        font-family: 'Roboto',sans-serif;
        margin-top: .2rem;
    }

    .firma_trainer .extra{
        position: absolute;
        left: 17%;
        font-size: .9rem;
        font-weight: 400;
        top: 92%;
        font-family: 'Roboto',sans-serif;
        margin-top: .2rem;
    }
    .firma_trainer .cip{
        position: absolute;
        left: 18%;
        font-size: .9rem;
        font-weight: 400;
        top: 94%;
        font-family: 'Roboto',sans-serif;
        margin-top: .2rem;
    }

    h1 {
        position: relative;
        font-size: 65px;
        font-family: 'Roboto',sans-serif;
        text-align: center;
        top: 90px;
    }

    h2 {
        position: relative;
        font-size: 30px;
        font-family: 'Roboto',sans-serif;
        text-align: center;
        top: 48px;
    }

    p {
        position: relative;
        text-align: justify;
        margin: 0px 100px 0px 100px;
        top: 65px;
    }

    .tipo {
        font-weight: bold;
        text-transform: uppercase;
    }

    ul {
        position: relative;
        /* list-style-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Futurama_Planet_Express.svg/220px-Futurama_Planet_Express.svg.png");*/
        margin: 0px 100px 0px 100px;
        text-align: center;
        top: 80px;
        font-size: smaller;
    }

    #sello {
        position: relative;
        width: 350px;
        top: 65px;
        top: -220px;
        left: 180px;
        /*transform: rotate(80deg); /*NO PONER ESPACIO*/
        -webkit-filter: opacity(0.3);
        filter: opacity(0.3);
        /* Mas filtros??*/
        z-index: -5;
    }

    #firma {
        position: relative;
        font-family: 'Homemade Apple', cursive;
        line-height: 20px;
        top: 50px;
        left: 320px;
    }

</style>
<body>
<div id="pagina">
    <p class="participante">{{$certificate->model->firstname}}</p>
</div>
</body>

</html>
<!-- partial -->

</body>
</html>
