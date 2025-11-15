<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>

<xsl:template match="/faktura">

    <div class="pole-danych" style="top: 60px; left: 450px; font-size:1.8rem">
        <xsl:value-of select="faktura_nr"/>
    </div>
    
    
    <div class="pole-danych" style="top: 10px; left: 110px;">
        <xsl:value-of select="sprzedawca/nazwa"/>
    </div>

    <div class="pole-danych" style="top: 55px; left: 110px; font-size:0.7rem;">
        <xsl:value-of select="sprzedawca/adres"/>
    </div>
    
    <div class="pole-danych" style="top: 75px; left: 110px;">
        <xsl:value-of select="sprzedawca/nip"/>
    </div>



    
    <div class="pole-danych" style="top: 115px; left: 240px;">
        <xsl:value-of select="nabywca/nazwa"/>
    </div>
    <div class="pole-danych" style="top: 147px; left: 135px; font-size:1.1rem;">
        <xsl:value-of select="nabywca/adres"/>
    </div>
    <div class="pole-danych" style="top: 147px; left: 745px;">
        <xsl:value-of select="nabywca/nip"/>
    </div>
    


    <div class="pole-danych" style="top: 225px; left: 65px;">
        <xsl:value-of select="towar/towar1/lp"/>
    </div>
    <div class="pole-danych" style="top: 225px; left: 100px;">
        <xsl:value-of select="towar/towar1/nazwa"/>
    </div>
    <div class="pole-danych" style="top: 225px; left: 880px;">
        <xsl:value-of select="towar/towar1/cena/zl"/>
    </div>
    <div class="pole-danych" style="top: 225px; left: 940px;">
        <xsl:value-of select="towar/towar1/cena/gr"/>
    </div>


    <div class="pole-danych" style="top: 250px; left: 65px;">
        <xsl:value-of select="towar/towar2/lp"/>
    </div>
    <div class="pole-danych" style="top: 250px; left: 100px;">
        <xsl:value-of select="towar/towar2/nazwa"/>
    </div>
    <div class="pole-danych" style="top: 250px; left: 880px;">
        <xsl:value-of select="towar/towar2/cena/zl"/>
    </div>
    <div class="pole-danych" style="top: 250px; left: 940px;">
        <xsl:value-of select="towar/towar2/cena/gr"/>
    </div>


    <div class="pole-danych" style="top: 275px; left: 65px;">
        <xsl:value-of select="towar/towar3/lp"/>
    </div>
    <div class="pole-danych" style="top: 275px; left: 100px;">
        <xsl:value-of select="towar/towar3/nazwa"/>
    </div>
    <div class="pole-danych" style="top: 275px; left: 880px;">
        <xsl:value-of select="towar/towar3/cena/zl"/>
    </div>
    <div class="pole-danych" style="top: 275px; left: 940px;">
        <xsl:value-of select="towar/towar3/cena/gr"/>
    </div>


    <div class="pole-danych" style="top: 504px; left: 610px;">
        <xsl:value-of select="towar/razem"/>
    </div>

    </xsl:template>

</xsl:stylesheet>