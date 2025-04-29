<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Footer</title>
    <style>
    /* Footer styling */
    footer {
        background-color: #343a40;
        color: #fff;
        padding: 10px 0;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    footer p {
        margin: 0;
        font-size: 14px;
    }

    footer p:nth-child(1) {
        font-weight: bold;
    }

    footer p:nth-child(2) {
        font-size: 16px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        footer {
            position: fixed;
            padding: 10px 0;
        }

        footer p {
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        footer {
            text-align: center;
            padding: 20px 0;
        }

        footer p {
            font-size: 8px;
        }
    }
    </style>
</head>

<body>

    <!-- Main content of the page here -->

    <footer>
        <p>&copy; <i>Copy Right Reserved! 2017 E.C</i> : Debre Markos University Dormitory Management System</p>
    </footer>

</body>

</html>