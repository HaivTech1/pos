<script>
<?php $months =  ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>

Morris.Bar({
    element: 'demo-morris-bar-month',
    data: [
        <?php
            foreach ($months as $key => $value) {
                // code...
                $month = $key+1;
                $found = false;
                
                

            } 
        ?>
    ],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['Male', 'Female', 'Children'],
    gridEnabled: true,
    gridLineColor: 'rgba(0,0,0,.1)',
    gridTextColor: '#8f9ea6',
    gridTextSize: '11px',
    barColors: ['#8c0e0e', 'green', 'yellow'],
    resize: true,
    hideHover: 'auto'
});
</script>