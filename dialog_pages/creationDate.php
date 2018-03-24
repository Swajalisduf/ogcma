<h2>Creation Date</h2>

<div class="date-radios">
  <div class="overlay"></div>
  <ul>
    <!-- Also would like to have the other option fade out (like it is before the date input is selected) since it should only allow one to be selected at a time -->
    <li><input type="checkbox" name="ca" value="ca.">ca.</li>
    <li><input type="checkbox" name="ca" value="before">before</li>
  </ul>
</div>

<div class="holder">
  <input type="text" name="date" class="text-input" autofocus><br>
  <label>Date (optional)</label>
</div>

<div class="date-radios">
  <div class="overlay"></div>
  <ul>
    <li><input type="radio" name="bc" value="B.C.">B.C.</li>
    <!-- What is the span tag in there for? Also it should have a closing tag, as is it's technically broken HTML, Google Chrome is just being nice and fixing it for you -->
    <li><input type="radio" name="bc" value="A.D." checked>A.D.<span class="italic"></li>
  </ul>
</div>
