<?php
$title = 'History';
require_once 'config/db.php';
include 'includes/header.php';

// Server-side rendering with PHP (Unit III: PHP + MySQL)
$rows = db()->query("SELECT b.id, s.slot_number, b.vehicle_no, b.entry_time, b.exit_time, b.fee, b.status
                     FROM bookings b JOIN slots s ON s.id = b.slot_id
                     ORDER BY b.id DESC LIMIT 100")->fetchAll();
$total = array_sum(array_column($rows, 'fee'));
?>
<h4>Parking History</h4>
<p class="text-muted">Total collection (last 100 records): <strong>Rs. <?= number_format($total, 2) ?></strong></p>
<div class="table-responsive">
<table class="table table-striped table-hover align-middle">
  <thead class="table-dark"><tr><th>#</th><th>Slot</th><th>Vehicle</th><th>Entry</th><th>Exit</th><th>Fee (Rs.)</th><th>Status</th></tr></thead>
  <tbody>
  <?php foreach ($rows as $r): ?>
    <tr>
      <td><?= $r['id'] ?></td>
      <td><?= htmlspecialchars($r['slot_number']) ?></td>
      <td><?= htmlspecialchars($r['vehicle_no']) ?></td>
      <td><?= $r['entry_time'] ?></td>
      <td><?= $r['exit_time'] ?? '-' ?></td>
      <td><?= $r['fee'] !== null ? number_format($r['fee'], 2) : '-' ?></td>
      <td><span class="badge bg-<?= $r['status']=='ACTIVE' ? 'danger' : 'success' ?>"><?= $r['status'] ?></span></td>
    </tr>
  <?php endforeach; ?>
  <?php if (!$rows): ?><tr><td colspan="7" class="text-center">No records yet</td></tr><?php endif; ?>
  </tbody>
</table>
</div>
<?php include 'includes/footer.php'; ?>
