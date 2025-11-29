async function wyswietlXML() {
    const [xmlResponse, xslRespone] = await Promise.all([
        fetch('plik.xml'),
        fetch('styl.xsl')
    ]).catch(error =>{
        console.error("Błąd przy ładowaniu plików")
        return [null, null];
    });

    if(!xmlResponse || !xmlResponse.ok || !xslRespone.ok){
        document.getElementById('formularz').innerHTML = '<h2>Błąd wczytania danych</h2>';
        return;
    }

    const xmlText = await xmlResponse.text();
    const xslText = await xslRespone.text();

    const parser = new DOMParser();
    const xslDoc = parser.parseFromString(xslText, 'text/xml');
    const xmlDoc = parser.parseFromString(xmlText, 'text/xml');


    let lacznaCena = 0;
    const towary = xmlDoc.querySelectorAll('towar > *');

    towary.forEach(towar => {
        if(towar.querySelector('cena')){
            const zl = parseFloat(towar.querySelector('cena > zl').textContent) || 0;
            const gr = parseFloat(towar.querySelector('cena > gr').textContent) || 0;

            lacznaCena += (zl*100) + gr;
        }
    });

    const totalZl = Math.floor(lacznaCena/100);
    const totalGr = lacznaCena % 100;
    const formatedCena = `${totalZl},${totalGr.toString().padStart(2,'0')}zł`;

    const razemElement = xmlDoc.createElement('razem');
    razemElement.textContent = formatedCena;

    const towarNode = xmlDoc.querySelector('towar');
    if(towarNode){
        towarNode.appendChild(razemElement);
    }


    const xsltProcessor = new XSLTProcessor();
    xsltProcessor.importStylesheet(xslDoc);

    const wynikFragment = xsltProcessor.transformToFragment(xmlDoc, document);

    const formularzDiv = document.getElementById('formularz');
    if(wynikFragment){
        formularzDiv.appendChild(wynikFragment);
    }
    else{
        formularzDiv.innerHTML = "Błąd";
    }

}

wyswietlXML();