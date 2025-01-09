<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script>
        // Enable or disable the button based on checkbox status
        function toggleButton() {
            const confirmCheckbox = document.getElementById('confirm-checkbox');
            const submitButton = document.getElementById('submit-button');
            submitButton.disabled = !confirmCheckbox.checked;
        }

        // Show confirmation dialog before submission
        function confirmSubmission(event) {
            const confirmation = confirm("Are you sure the information provided is correct?");
            if (!confirmation) {
                event.preventDefault(); // Prevent form submission if user selects "No"
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Checkout</h1>
        <form action="{{ route('payment.process') }}" method="POST" onsubmit="confirmSubmission(event)">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
            
            <p class="text-center">Plan: {{ $plan->name }}</p>
            <p class="text-center">Price: {{ $plan->price }} TRY</p>
            
            <!-- Card Details -->
            <h4>Card Details</h4>
            <div class="mb-3">
                <label for="card_holder_name" class="form-label">Card Holder Name</label>
                <input type="text" name="card_holder_name" id="card_holder_name" class="form-control" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label for="card_number" class="form-label">Card Number</label>
                <input type="text" name="card_number" id="card_number" class="form-control" maxlength="16" minlength="16" placeholder="5528790000000008" required 
                    pattern="\d{16}" title="Card number must be exactly 16 digits">
            </div>
            <div class="row">
                <!-- Expire Month -->
                <div class="col-md-6 mb-3">
                    <label for="expire_month" class="form-label">Expire Month (MM)</label>
                    <input type="text" name="expire_month" id="expire_month" class="form-control" maxlength="2" minlength="2" 
                        placeholder="12" required pattern="0[1-9]|1[0-2]" 
                        title="Please enter a valid month (01 to 12)">
                </div>
    
    <!-- Expire Year -->
    <div class="col-md-6 mb-3">
                <label for="expire_year" class="form-label">Expire Year (YY)</label>
                <input type="text" name="expire_year" id="expire_year" class="form-control" maxlength="2" minlength="2" 
                    placeholder="30" required pattern="\d{2}" 
                    title="Please enter a valid 2-digit year (e.g., 23)">
            </div>
        </div>

        <!-- CVC -->
        <div class="mb-3">
            <label for="cvc" class="form-label">CVC</label>
            <input type="text" name="cvc" id="cvc" class="form-control" maxlength="3" minlength="3" 
                placeholder="123" required pattern="\d{3}" 
                title="Please enter a valid 3-digit CVC">
        </div>


            <!-- Confirmation Checkbox -->
            <div class="form-check mb-3">
                <input type="checkbox" id="confirm-checkbox" class="form-check-input" onclick="toggleButton()">
                <label for="confirm-checkbox" class="form-check-label">I confirm that the information provided is correct</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submit-button" class="btn btn-primary w-100" disabled>Pay</button>
        </form>
    </div>
</body>
</html>
