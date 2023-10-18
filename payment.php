<?php
session_start();
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not login 
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
                        <td><button class='viewButton' onclick="showPopup('Jill Smith')">Validate</button></td>
                    </tr>
                    <tr>
                        <td>Eve</td>
                        <td>Jackson</td>
                        <td>50</td>
                        <td>2021-10-02 07:23:35</td>
                        <td><button class='viewButton' onclick="showPopup('Eve Jackson')">Validate</button></td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>50</td>
                        <td>2023-05-02 08:24:35</td>
                        <td><button class='viewButton' onclick="showPopup('John Doe')">Validate</button></td>
                    </tr>
                </tbody>
            </table>

            <div class="popup" id="popup">
           
                <p id="popupContent"></p>
                
                <hr>
                //TODO another modal for changing doctors and there will be a audit trail to know who's user change the doctor
                <p> Change Doctor: </p> 
                <button class="closeButton" onclick="hidePopup()">Close</button>
            </div>
        </div>
    </div>
    <script>
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

        //function for pop up 
        function showPopup(content) {
            var popup = document.getElementById('popup');
            var popupContent = document.getElementById('popupContent');
            popupContent.innerHTML = 'Popup content for: ' + content;
            popup.style.display = 'block';
        }

        //function for hide pop up
        function hidePopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'none';
        }
    </script>
</body>

</html>