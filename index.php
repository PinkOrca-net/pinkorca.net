<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="shortcut icon" href="static/images/icons/PinkOrca.png">
    <meta name="description" content="وب‌سایت شخصی پینک اورکا / علی مظلوم (Pink Orca)">
    <meta name="keywords" content="پینک اورکا, علی مظلوم, Pink Orca, Ali Mazloom">
    <title>Pink Orca | پینک اورکا</title>
</head>
<body class="bg-slate-900">
    

    <!-- Main Container -->
    <main class="flex flex-col w-full gap-12 px-4 text-white max-w-screen-2xl">

        <?php
        session_start();
        $token = md5(uniqid(rand(), TRUE));
        $_SESSION['csrf_token'] = $token;
        
        include_once('./includes/pre-loader.php');
        include_once('./includes/navbar.php');
        include_once('./includes/hero.php');
        include_once('./includes/skills.php');
        include_once('./includes/anonymous-message.php');
        include_once('./includes/social-links.php');
        include_once('./includes/footer.php');
        ?>
    </main>

<script src="static/js/main.js"></script>
</body>
</html>