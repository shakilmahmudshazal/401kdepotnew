<form action="/saveQuotaRequest" method="post">
                    @csrf

                    <label>you need help with: </label>
                    <input type="text" name="subject" required>
                    <br>
                    <label>Details: </label>
                    <textarea rows="5" cols="50" name="details" required></textarea>
                    <br>
                    <label>your Name: </label>
                    <input type="text" name="name" required>
                    <br>
                    <label>your Email </label>
                    <input type="email" name="email" required>
                    <br>
                    <label>your Phone: </label>
                    <input type="text" name="phone" required>
                    <br>
                    <label>your City: </label>
                    <input type="text" name="city" required>
                    <br>
                    <label>your state: </label>
                    <input type="text" name="state" required>
                    <br>
                    <label>your Zip Code: </label>
                    <input type="text" name="zipcode" required>
                    <br>
                    <button type="Submit">Submit</button>
                     



                   </form>