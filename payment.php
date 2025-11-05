<?php
session_start();
include 'db.php';
include 'side_bar.php';

if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red; text-align:center;'>You must log in to choose a plan.</p>";
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<section class="body" style="padding:40px; font-family: Arial, sans-serif; background:#111; color:#fff; border-radius:30px;">
    <div style="text-align:center; margin-bottom:40px;">
        <h1>Choose Your Plan</h1>
        <p style="color:#ccc;">Unlock endless entertainment with MoviesHub. Select the plan that fits your needs.</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(2,1fr); gap:30px; max-width:900px; margin:0 auto;">
        <div class="plan free" style="background:#1c1c1c; border:2px solid green; border-radius:15px; padding:30px; text-align:center; cursor:pointer;">
            <h2 style="color:green;">Free Plan</h2>
            <p style="color:#bbb;">Enjoy limited access to MoviesHub with previews up to 5 minutes.</p>
            <ul style="color:#ccc; list-style:none; padding:0; text-align:left;">
                <li>✔ Watch movie previews (5 min)</li>
                <li>✘ No access to Search</li>
                <li>✘ No access to Categories</li>
            </ul>
            <h3 style="margin:20px 0;">Free</h3>
            <button class="btn btn-secondary choose-plan" data-type="Free">Get Started (Free)</button>
        </div>
        <div class="plan paid" style="background:#1c1c1c; border:2px solid red; border-radius:15px; padding:30px; text-align:center; cursor:pointer;">
            <h2 style="color:red;">Premium Plan</h2>
            <p style="color:#bbb;">Unlock full access to MoviesHub with no limits and exclusive features.</p>
            <ul style="color:#ccc; list-style:none; padding:0; text-align:left;">
                <li>✔ Unlimited movie streaming</li>
                <li>✔ Full access to Search</li>
                <li>✔ Full access to Categories</li>
            </ul>
            <h3 style="margin:20px 0;">₹10/month</h3>
            <button class="btn btn-success choose-plan" data-type="Paid">Upgrade Now (₹10/month)</button>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</section>

<div class="modal fade" id="paymentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#111; color:#fff; padding:20px; text-align:center;">
      <h2>Complete Your Payment</h2>
      <p>Scan the QR code below to pay ₹10.</p>
      <img src="media/QR.jpg" alt="QR Code" style="width:200px; margin:20px 0; align-self:center;">
      <form action="update.php" method="POST" id="paymentForm" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
          <div class="mb-3">
              <label for="transaction_id">Transaction ID:</label><br>
              <input type="text" name="transaction_id" id="transaction_id" required style="width:80%; padding:5px;">
          </div>
          <div class="mb-3">
              <label for="screenshot">Upload Payment Screenshot:</label><br>
              <input type="file" name="screenshot" id="screenshot" accept="image/*" required style="margin-top:5px;">
          </div>
          <button type="submit" class="btn btn-success">Submit Payment</button>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    $('.choose-plan').click(function(){
        var type = $(this).data('type');

        if(type === 'Free'){
            $.ajax({
                url: 'update.php',
                type: 'GET',
                data: { type: type },
                success: function(response){
                    var data = JSON.parse(response);
                    if(data.success){
                        alert(data.message + "\nAccount Type: " + data.account_type +
                              "\nStart: " + data.subscription_start +
                              "\nExpiry: " + data.subscription_end);
                        window.location.href = 'profile.php';
                    } else {
                        alert("Error: "+data.message);
                    }
                },
                error: function(xhr){
                    alert("Error updating Free plan: " + xhr.responseText);
                }
            });
        } else {
            var modal = new bootstrap.Modal(document.getElementById('paymentModal'));
            modal.show();
        }
    });

    // $('#paymentForm').submit(function(e){
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     formData.append('plan_type', 'Paid');

    //     $.ajax({
    //         url: 'update.php',
    //         type: 'POST',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function(response){
    //             var data = JSON.parse(response);
    //             if(data.success){
    //                 alert(data.message + "\nAccount Type: " + data.account_type +
    //                       "\nStart: " + data.subscription_start +
    //                       "\nExpiry: " + data.subscription_end);
    //                 window.location.href = 'profile.php';
    //             } else {
    //                 alert("Payment Error: "+data.message);
    //             }
    //         },
    //         error: function(xhr){
    //             alert("Payment submission failed: " + xhr.responseText);
    //         }
    //     });
    // });
});
</script>

</script>
