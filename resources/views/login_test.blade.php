<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeeksForGeeks</title>
    <!-- Here we had include the Driver library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@0.9.8/dist/driver.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {

font-family: 'Arial', sans-serif;
margin: 20px;
}

.section {
margin-top: 200px;
margin-bottom: 20px;
}

.button {
padding: 10px;
text-decoration: none;
color: #fff;
background-color: #118b04;
border: 1px solid #118b04;
border-radius: 4px;
cursor: pointer;
}

.field {
width: 500px;
margin-top: 20px;
}

.input {
width: 100%;
padding: 8px;
box-sizing: border-box;
}

</style>

<body>
    <section class="section">
        <a class="button is-primary" id="btn1">GeeksForGeeks</a>
        <div class="field">
            <label class="label"></label>
            <div class="control">
                <input
                       class="input"
                       id="test1"
                       type="text"
                       placeholder="Tell me something about you?">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/driver.js@0.9.8/dist/driver.min.js"></script>
    <script>
        let driver = new Driver();

function highlightElement(element, title, description, position = "top") {
    let actualElement = document.querySelector(element);

    driver.highlight({
        element: actualElement,
        popover: {
            title: title,
            description: description,
            position: position
        }
    });
}

document.getElementById("btn1").addEventListener("click", function (event) {
    event.stopPropagation();
    highlightElement("#test1", "Enter something about you.", "Text format only");
});

    </script>


</body>

</html>
