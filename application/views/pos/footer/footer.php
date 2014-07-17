    <!-- Core Scripts - Include with every page -->
    <script src="assets_pos/plugins/jquery/core/jquery-1.11.0.js"></script>
    <script src="assets_pos/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets_pos/plugins/metisMenu/jquery.metisMenu.js"></script>


    <!-- Plugin Script - form validation -->
    <script type="text/javascript" src="assets_pos/plugins/bootstrapvalidator/dist/js/bootstrapValidator.js"></script>
    <script src="assets_pos/plugins/bootstrapvalidator/validate.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="assets_pos/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets_pos/plugins/morris/morris.js"></script>

    <!-- gridster  -->
    <script src="assets_pos/plugins/gridster/dist/jquery.gridster.min.js"></script>

    <!-- salvattore  
    <script src="assets_pos/plugins/salvattore/js/salvattore.min.js"></script>-->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="assets_pos/js/sb-admin.js"></script>

    <script src="<?php echo base_url(); ?>assets_inv/chartjs/js/knockout-3.0.0.js"></script>
    <script src="<?php echo base_url(); ?>assets_inv/chartjs/js/globalize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_inv/chartjs/js/dx.chartjs.js"></script>
    
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script>
        $(function ()  {
            var dataSource = [
                {status: "Credit",  val: <?php echo $payment_type['credit']; ?>},
                {status: "Cash", val: <?php echo $payment_type['cash']; ?>},
                {status: "Cheque",  val: <?php echo $payment_type['cheque'];  ?>}
            ];

             $("#chartContainer").dxPieChart({
                    dataSource: dataSource,
                    title: "payment status",
                    tooltip: {
                        enabled: true,
                        percentPrecision: 2,
                        customizeText: function() { 
                            return this.valueText + " - " + this.percentText;
                        }
                    },
                    legend: {
                        horizontalAlignment: "center",
                        verticalAlignment: "top",
                        margin: 0
                    },
                    series: [{
                        type: "doughnut",
                        argumentField: "status",
                        label: {
                            visible: true,
                            connector: {
                                visible: true
                            }
                        }
                    }]
                });

         /* google map code*/
         var locations = [
                ['Bondi Beach', -33.890542, 151.274856, 4],
                ['Coogee Beach', -33.923036, 151.259052, 5],
                ['Cronulla Beach', -34.028249, 151.157507, 3],
                ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                ['Maroubra Beach', -33.950198, 151.259302, 1]
            ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: new google.maps.LatLng(-33.92, 151.25),
            mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) 
        {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        
        });
    </script>

    <script type="text/javascript">
        $(function(){
            $(".gridster ul").gridster({
                widget_margins: [5, 5],
                widget_base_dimensions: [140, 140]
            });
        });
    </script>

</body>

</html>
