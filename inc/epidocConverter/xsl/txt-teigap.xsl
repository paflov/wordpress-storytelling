<?xml version="1.0" encoding="UTF-8"?>
<!-- $Id: txt-teigap.xsl 2354 2015-05-08 16:28:41Z paregorios $ -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:t="http://www.tei-c.org/ns/1.0"
                version="2.0">
  <!-- Imported templates can be found in teigap.xsl -->
  <xsl:import href="teigap.xsl"/>
  
  <xsl:template match="t:gap[@reason = 'lost']">
      <xsl:param name="parm-leiden-style" tunnel="yes" required="no"></xsl:param>
      <xsl:if test="@extent='unknown' and @reason='lost' and @unit='line' and ($parm-leiden-style = 'ddbdp' or $parm-leiden-style = 'sammelbuch')">
         <xsl:text>
&#xD;</xsl:text>
      </xsl:if>
      <xsl:apply-imports/>
  </xsl:template>
  
</xsl:stylesheet>
