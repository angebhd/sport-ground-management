<div id="book">
    <h1> Book a pitch </h1>
    <form action="/?page=book" method="post">
    
        <label for="date"> Date:</label>
        <input type="date" name="date" id="start-date" required>
        <label for="hour"> Hour:</label>
        <input type="time" name="hour" id="" required>
        <br>
        <label for="pitch"> Select the pitch or pool: </label>
        <select name="pitch" id="" required>
            <option value="1"> Basket court</option>
            <option value="2"> Basket court mini</option>
            <option value="3"> Football pitch</option>
            <option value="4"> Football pitch mini</option>
            <option value="5"> Hanball court </option>
            <option value="6"> Hanball court mini</option>
            <option value="7"> Swimming pool </option>
            <option value="8"> Swimming pool mini</option>
            <option value="9"> Rugby pitch </option>
            <option value="10">Rugby pitch mini</option>
            <option value="11">Tennis pitch </option>
            <option value="12">Tennis pitch mini</option>
            <option value="13">Volleyball pitch </option>
            <option value="14">Volleyball pitch mini</option>
        </select>
        <br>
        <label for="duration"> Duration: </label>
        <input type="number" name="duration" id="" class="duration" min="1" required>
        <fieldset required>
            <input type="radio" name="offer" id="radio-hours" value="1"> <label for="radio-hours"> Hours </label>
            <input type="radio" name="offer" id="radio-days" value="2"> <label for="radio-hours"> Days </label>
            <input type="radio" name="offer" id="radio-months" value="3"> <label for="radio-hours"> Months </label>

        </fieldset>
        <button type="submit" class="submit"><?php echo 'BOOK';?></button>
        
    </form>
</div>
<script src="scripts/book.js"></script>