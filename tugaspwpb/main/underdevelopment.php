<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Development</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        .container {
            text-align: center;
            position: relative;
        }

        h1 {
            font-size: 4rem;
            color: #000000;
            cursor: pointer;
            animation: none;
            transition: opacity 0.5s;
            user-select: none;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 id="underDev">UNDER DEVELOPMENT!</h1>
    </div>

    <script>
        document.getElementById('underDev').addEventListener('click', (event) => {
            event.preventDefault(); // Mencegah tampilan garis seleksi (|) di teks
            const underDev = event.target;
            
            underDev.style.animation = "pulse 0.5s ease-in-out";
            setTimeout(() => {
                underDev.style.opacity = "0"; // Menghilangkan teks sementara
                setTimeout(() => {
                    underDev.style.opacity = "1"; // Menampilkan kembali teks
                }, 500);
            }, 500);

            setTimeout(() => {
                underDev.style.animation = "none";
            }, 1000);
        });
    </script>
</body>
</html>
