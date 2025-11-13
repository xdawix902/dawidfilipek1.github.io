<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>

<xsl:template match="/faktura">

    <div class="pole-danych" style="top: 60px; left: 450px; font-size:1.8rem">
        <xsl:value-of select="faktura_nr"/>
    </div>

    <div class="pole-danych" style="top: 70px; left: 640px;">
        <xsl:value-of select="numer"/>
    </div>
    
    <div class="pole-danych" style="top: 70px; left: 855px;">
        <xsl:value-of select="data_wystawienia"/>
    </div>
    
    <div class="pole-danych" style="top: 30px; left: 110px;">
        <xsl:value-of select="sprzedawca/nazwa"/>
    </div>

    <div class="pole-danych" style="top: 75px; left: 110px; font-size:0.7rem;">
        <xsl:value-of select="sprzedawca/adres"/>
    </div>
    
    <div class="pole-danych" style="top: 102px; left: 110px;">
        <xsl:value-of select="sprzedawca/nip"/>
    </div>



    
    <div class="pole-danych" style="top: 140px; left: 240px;">
        <xsl:value-of select="nabywca/nazwa"/>
    </div>
    <div class="pole-danych" style="top: 171px; left: 140px; font-size:1.1rem;">
        <xsl:value-of select="nabywca/adres"/>
    </div>
    <div class="pole-danych" style="top: 171px; left: 745px;">
        <xsl:value-of select="nabywca/nip"/>
    </div>
    
    </xsl:template>

</xsl:stylesheet>