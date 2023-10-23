<?php
session_start();
$username = $_SESSION['username'];

//login validation
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctors Fee System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("./nav/navbar.php"); ?>

    <div class="content">
        <div class="container payment">
            <p> PAYMENT</p>
            <table id="dateTable" class="validation">
                <tread>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>Date
                            <select id="dateSortDropdown" onchange="sortTableByDate('dateTable')">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </th>
                        <th>View</th>
                    </tr>
                </tread>
                <tbody>
                    <tr>
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>50</td>
                        <td>2023-2-20 18:10:35</td>
                        <td><button onclick="openMainPopup('Jill Smith')">Validate</button></td>
                    </tr>
                    <tr>
                        <td>Eve</td>
                        <td>Jackson</td>
                        <td>50</td>
                        <td>2021-10-02 07:23:35</td>
                        <td><button onclick="openMainPopup('Eve Jackson')">Validate</button></td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>50</td>
                        <td>2023-05-02 08:24:35</td>
                        <td><button onclick="openMainPopup('John Doe')">Validate</button></td>
                    </tr>
                </tbody>
            </table>

            <div id="mainPopup" class="overlay">
                <div class="popup">
                    <div class="popup-header">
                        <h2 class="title">Payment</h2>
                        <button class="closePopup" onclick="closeMainPopup()">&times;</button>
                    </div>
                    <div class="popup-body">
                        <p id="popupContent"></p>
                        <form>
                            <input type="radio" id="Yes" name="validate" value="Yes">
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="validate" value="No">
                            <label for="No">No</label><br>
                            <br>
                            <input type="submit" value="Submit">
                        </form>

                        <hr>
                        <button onclick="openChangeDocPopup()">Change Doctor</button>
                    </div>
                </div>
            </div>

            <div id="nestedPopup" class="overlay">
                <div class="popup">
                    <div class="popup-header">
                        <h2 class="title">Search for Doctor</h2>
                        <button class="closePopup" onclick="closeChangeDocPopup()">&times;</button>
                    </div>
                    <div class="popup-body">
                        <table class="doctorslist">
                            <tr>
                                <th>Select</th>
                                <th>Fullname</th>
                                <th>Department</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Chasey Elizarde</td>
                                    <td>Neurologist </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Chasey Elizarde</td>
                                    <td>Neurologist </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Chasey Elizarde</td>
                                    <td>Neurologist </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Chasey Elizarde</td>
                                    <td>Neurologist </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Chasey Elizarde</td>
                                    <td>Neurologist </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openMainPopup(content) {
            var popup = document.getElementById('mainPopup');
            var popupContent = document.getElementById('popupContent');
            popupContent.innerHTML = 'Doctors Name: ' + content;
            popup.style.display = 'block';
        }

        function closeMainPopup() {
            document.getElementById("mainPopup").style.display = "none";
        }

        function openChangeDocPopup() {
            document.getElementById("nestedPopup").style.display = "block";
        }

        function closeChangeDocPopup() {
            document.getElementById("nestedPopup").style.display = "none";
        }

        //function for sorting date 
        function sortTableByDate(tableId) {
            var table = document.getElementById(tableId);
            var rows = Array.from(table.rows);

            rows.sort(function (a, b) {
                var dateA = new Date(a.cells[3].innerText);
                var dateB = new Date(b.cells[3].innerText);

                var sortOrder = document.getElementById('dateSortDropdown').value;
                if (sortOrder === 'asc') {
                    return dateA - dateB;
                } else {
                    return dateB - dateA;
                }
            });

            // Remove existing rows
            while (table.rows.length > 0) {
                table.deleteRow(0);
            }

            // Add the sorted rows back
            for (var i = 0; i < rows.length; i++) {
                table.appendChild(rows[i]);
            }
        }

    </script>
</body>

</html>