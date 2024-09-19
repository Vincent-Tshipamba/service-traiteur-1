<?php

$query2 = "SELECT * FROM plats WHERE menu_id=$id ORDER BY id DESC";

$platsparmenu = $pdo->query($query2)->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="">
    <table id="platsparmenu" class="w-full stripe row-border order-column nowrap" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Disponibilité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($platsparmenu)) : ?>
                <?php $key = 1;
                foreach ($platsparmenu as $plat) : ?>
                    <tr>
                        <td><?= $key++ ?></td>
                        <td><?= $plat['nom'] ?></td>
                        <td>
                            <?= $plat['prix'] ?>
                        </td>
                        <td><?= $plat['disponibilite'] ? '✔' : "❌" ?></td>
                        <td>
                            <a href="detail.php?id=<?= $plat['id'] ?>">
                                <svg class="w-6 h-6 hover:text-gray-800 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.1/js/dataTables.fixedColumns.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.1/js/fixedColumns.dataTables.js"></script>
<script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
<script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
<script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>

<script>
    new DataTable('#platsparmenu', {

    });
</script>