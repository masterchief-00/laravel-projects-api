<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <title>Pac++ Studios | API</title>
    @cloudinaryJS
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form action="">
                <input type="text" name="name" placeholder="Project Title" />
                <select name="categoryId">
                    <option value="0" selected>CGI</option>
                    <option value="0">3D Printing</option>
                </select>
                <textarea name="discription" placeholder="Project Discription"></textarea>
                <input type="text" name="init_date" placeholder="Initial Date" />
                <input type="text" name="completion_date" placeholder="Completion Date" />
                <input type="file" name="project_image"/>
                <input type="file" name="image" multiple/>
            </form>
        </div>
    </div>
</body>
</html>