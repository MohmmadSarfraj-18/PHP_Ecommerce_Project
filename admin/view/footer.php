
            </main>
        </div>
    </div>
</body>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Product Validation -->
    <script src="../../assets/js/productValidation.js"></script>
    <!-- Category Validation -->
    <script src="../../assets/js/category.js"></script>

    <script src="../../assets/js/ajaxJquery.min.js"></script>

    <!-- For Dashboard Graph -->
    <script src="../../assets/js/canvasjs.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->
    <script src="../../assets/js/jQuerydataTable.js"></script>

    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("bar-chart", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title:{
                    // text: "Simple Column Chart with Index Labels"
                },
                axisY:{
                    includeZero: true
                },
                data: [{
                    color:"#a08db0",
                    type: "column", //change type to bar, line, area, pie, etc
                    indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#3f2a52",
                    indexLabelFontSize: "20",
                    indexLabelFontWeight: "bold",
                    indexLabelPlacement: "outside",   
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>

    <script>
        $(document).ready(function(){

            let table = new DataTable('.data-table');
          
        });

        //  code for show on 5 records on 1 page IN Product Page
        new DataTable('#example', {
            lengthMenu: [
                [5, 25, 50, -1],
                [5, 25, 50, 'All']
            ]
        });

        // SET 8 ROW ONLY FOR SHOWING IN Orders Table
        new DataTable('#order_table', {
            lengthMenu: [
                [8, 25, 50, -1],
                [8, 25, 50, 'All']
            ]
        });

        // SET 6 ROW ONLY FOR SHOWING IN Users Page
        new DataTable('#user_table', {
            lengthMenu: [
                [6, 25, 50, -1],
                [6, 25, 50, 'All']
            ]
        });
        
        // SET 8 ROW ONLY ON Category Page
        new DataTable('#category', {
            lengthMenu: [
                [8, 25, 50, -1],
                [8, 25, 50, 'All']
            ]
        });
    </script>
</html>