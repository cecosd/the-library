window.onload = (event) => {
    const url = new URL(window.location.href);
    const searchTerm = url.searchParams.get('s');

    getSearchElement().value = searchTerm;

};

const submitSearch = (event) => {
    
    if (event.key == "Enter") {
        event.preventDefault()
        searchRequest()
    }
}

const searchRequest = () => {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("search-results").innerHTML = '';

            let searchResults = JSON.parse(this.responseText);
            const resultHolder = document.getElementById("search-results");

            if(searchResults.length == 0) {
                let searchItemAuthorEl = document.createElement('div');
                searchItemAuthorEl.className = 'search-result-item animate';
                searchItemAuthorEl.innerText = 'No results found';
                resultHolder.appendChild(searchItemAuthorEl)
            } else {
                for(let i = 0; i < searchResults.length; i++ ) {
                    let newNode = document.createElement('div');
                    newNode.className = 'search-result-item animate';
    
                    let searchItemAuthorEl = document.createElement('div');
                    searchItemAuthorEl.className = 'search-result-author-name';
                    searchItemAuthorEl.innerText = searchResults[i].author_name;
                    newNode.appendChild(searchItemAuthorEl)
    
                    let searchItemNameEl = document.createElement('div');
                    searchItemNameEl.className = 'search-result-book-name';
                    searchItemNameEl.innerText = searchResults[i].book_name;
                    newNode.appendChild(searchItemNameEl)
    
                    resultHolder.appendChild(newNode)
                }
            }
        }
    };

    xhttp.open("GET", "/routes/search.php?s=" + getSearchElement().value, true);
    xhttp.send();
}

const getSearchElement = () => {
    return document.getElementById('search-term')
}