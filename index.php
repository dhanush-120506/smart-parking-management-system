<?php
$title = 'Dashboard';
require_once 'config/db.php';
include 'includes/header.php';
?>
<div id="alertBox"></div>

<!-- Stats -->
<div class="row text-center mb-4" id="stats">
  <div class="col-4"><div class="card shadow-sm"><div class="card-body"><h2 id="statTotal">0</h2><small>Total Slots</small></div></div></div>
  <div class="col-4"><div class="card shadow-sm border-success"><div class="card-body"><h2 id="statFree" class="text-success">0</h2><small>Free</small></div></div></div>
  <div class="col-4"><div class="card shadow-sm border-danger"><div class="card-body"><h2 id="statOcc" class="text-danger">0</h2><small>Occupied</small></div></div></div>
</div>

<div class="row g-4">
  <!-- Park / Exit forms -->
  <div class="col-lg-4">
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-primary text-white">Park a Vehicle</div>
      <div class="card-body">
        <form id="parkForm" novalidate>
          <label class="form-label" for="parkVehicle">Vehicle Number</label>
          <input id="parkVehicle" class="form-control mb-3" placeholder="TN01AB1234" required>
          <label class="form-label" for="parkSlot">Slot</label>
          <select id="parkSlot" class="form-select mb-3"><option value="0">Auto-assign</option></select>
          <button class="btn btn-primary w-100">Park</button>
        </form>
      </div>
    </div>
    <div class="card shadow-sm">
      <div class="card-header bg-warning">Exit &amp; Pay</div>
      <div class="card-body">
        <form id="exitForm" novalidate>
          <label class="form-label" for="exitVehicle">Vehicle Number</label>
          <input id="exitVehicle" class="form-control mb-3" required>
          <button class="btn btn-warning w-100">Calculate Fee &amp; Exit</button>
        </form>
        <small class="text-muted d-block mt-2">Rate: Rs. <?= RATE_PER_HOUR ?>/hour (minimum 1 hour)</small>
      </div>
    </div>
  </div>

  <!-- Slot grid -->
  <div class="col-lg-8">
    <div class="d-flex justify-content-between mb-2">
      <h5>Parking Slots</h5>
      <div>
        <select id="filterType" class="form-select form-select-sm d-inline-block w-auto">
          <option value="">All types</option><option>CAR</option><option>BIKE</option><option>EV</option>
        </select>
      </div>
    </div>
    <div id="slotGrid" class="row g-3"></div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
