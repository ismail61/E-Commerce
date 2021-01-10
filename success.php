<?php 
if(isset($_GET['tk'])){
    $tk = $_GET['tk'];
    ?>


<h2 class="text-center text-success">Congratulations! Your Transaction is Successful.</h2>
<br>
<table border="1" class="table table-striped">
    <thead class="thead-dark">
        <tr class="text-center">
            <th colspan="2">Payment Details</th>
        </tr>
    </thead>
    <tr>
        <td class="text-right">Amount</td>
        <td><?= $tk . ' ' . "BDT" ?></td>
    </tr>
</table>

<?php } ?>