<div id="search-boxes">
  <button type="button" value="simpleSearch" onclick="search(this)" class="sBtn" id="sBtnS">Egyszerű keresés</button>
  <button type="button" value="detailedSearch" onclick="search(this)" class="sBtn" id="sBtnD">Részletes keresés</button><br/>
  <form method="get">
    <input type="text" name="search_value" id="searchInput" placeholder="Keresés..."/>
    <button type="submit" id="search-btn"><img src="images/icons/search.png" alt=""/></button>
    <div id="search-filter-box">
      <select class="filter-input" id="category-filter" name="category">
        <option value="">Kategória</option>
        <option value="Összes_film">Összes film</option>
        <option value="Akció">Akció</option>
        <option value="Animációs">Animációs</option>
        <option value="Családi">Családi</option>
        <option value="Sci-fi">Sci-fi</option>
        <option value="Vígjáték">Vígjáték</option>
        <option value="Kaland">Kaland</option>
        <option value="Romantikus">Romantikus</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Életrajzi">Életrajzi</option>
        <option value="Filmdráma">Filmdráma</option>
        <option value="Krimi">Krimi</option>
        <option value="Dokumentum">Dokumentum</option>
        <option value="Thriller">Thriller</option>
        <option value="Háborús">Háborús</option>
        <option value="Western">Western</option>
        <option value="Kémfilm">Kémfilm</option>
        <option value="Misztikus">Misztikus</option>
        <option value="Történelmi">Történelmi</option>
        <option value="Zenés">Zenés</option>
      </select>
    </div>
  </form>
</div>
<div id="order-by-box">
  <select id="order-by" onchange="orderBy()">
    <option value="name_ASC">Név szerint növekvő</option>
    <option value="name_DESC">Név szerint csökkenő</option>
  </select>
</div>
