<!DOCTYPE html>
<html>
    <head>
        <title>King's Online . King's College London</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type='text/css'>
            body {
                font-family: Georgia;
                font-size: 2.618rem;
                margin: 0;
            }
            h1 {
                font-family: Impact;
                font-weight: normal;
                font-size: 2.618rem;
                padding: 0 20px;
            }
            .sort-wrap{
                padding: 0 50px;
                text-align: right; 
            }
            .card-wrap{
                padding: 50px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: stretch;
            }
            .card {
                background: #CDD7DC;
                padding: 2%;
                width: 29%;
                margin-bottom: 30px;
            }
            @media (max-width: 1400px) {
                .card-wrap{
                   padding: 20px; 
                }
                .sort-wrap{
                    padding: 0 20px;
                }
                .card {
                    width: 45%;
                }
            }
            @media (max-width: 800px) {
                .card-wrap{
                   padding: 0; 
                }
                .sort-wrap{
                    padding: 0;
                }
                .card {
                    width: 100%;
                }
            }
            .card:nth-child(3n){
                margin-right: 0;
            }
            .card>.image {
                width: 200px;
                height: 200px;
                margin: 0 auto 20px;
                background: #5A6469;
                border-radius: 100px;
            }
            .card>.info>div{
                margin-bottom: 10px;
            }
            .card>.info>.fullname {
                font-weight: bold;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded',function() {
                document.querySelector('select[name="sort"]').onchange=changeEventHandler;
            },false);
            function changeEventHandler(event) {
                document.getElementById('form').submit();
            }
        </script>
    </head>
    <body>
        <h1>King's Online . King's College London</h1>
        <div class="sort-wrap">
            <form id="form">
                <select name="sort">
                    <option value="lastNameDesc">Last Name &darr;</option>
                    <option value="dateJoinedDesc" selected>Date Joined &darr;</option>
                </select>
            </form>
        </div>
        <div class="card-wrap clearfix">
            <?php
                /**
                 * load and clean data.js to retrive only json string
                 * decode json to produce employees array
                 */
                $data = file_get_contents('./resources/data.js');
                $data = str_replace(['var data = ', ';',], '', $data);
                
                $employees = json_decode($data,true);
                // echo '<pre>';
                // //var_dump($employees);
                // echo '</pre>';
            ?>
            <?php foreach($employees as $employee): ?>
            <div class="card">
                <div class="image"></div>
                <div class="info">
                    <div class="fullname">
                        <?php echo $employee['firstName'].' '.$employee['lastName']; ?>
                    </div>
                    <div class="title">
                        <?php echo $employee['jobTitle']; ?>
                    </div>
                    <div class="reports-to">
                        <span class="label">Reports To:</span>
                        <span class='value'><?php echo $employee['reportsTo']; ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>