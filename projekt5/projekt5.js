async function wyswietlXML() {
    const [xmlResponse, xslRespone] = await Promise.all([
        fetch('plik.xml'),
        fetch('styl.xsl')
    ]).catch(error =>{
        console.error("Błąd ładowania plików.")
        return [null, null];
    });

    if(!xmlResponse || !xmlResponse.ok || !xslRespone.ok){
        document.getElementById('formularz').innerHTML = '<h2>Błąd ładowania danych</h2>';
        return;
    }

    const xmlText = await xmlResponse.text();
    const xslText = await xslRespone.text();

    const parser = new DOMParser();
    const xslDoc = parser.parseFromString(xslText, 'text/xml');
    const xmlDoc = parser.parseFromString(xmlText, 'text/xml');

    const xsltProcessor = new XSLTProcessor();
    xsltProcessor.importStylesheet(xslDoc);

    const wynikFragment = xsltProcessor.transformToFragment(xmlDoc, document);

    const formularzDiv = document.getElementById('formularz');
    if(wynikFragment){
        formularzDiv.appendChild(wynikFragment);
    }
    else{
        formularzDiv.innerHTML = "Błąd transformacji XSLT";
    }

}

wyswietlXML();