<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Bookstore</title>
                <style>
                    table { width: 100%; border-collapse: collapse; }
                    th { background-color: grey; color: white; padding: 8px; }
                    td { padding: 8px; text-align: left; }
                    .author { color: blue; font-weight: bold; text-transform: uppercase; }
                </style>
            </head>
            <body>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Publisher</th>
                            <th>Edition</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="bookstore/book">
                            <tr>
                                <td><xsl:value-of select="title"/></td>
                                <td class="author"><xsl:value-of select="author"/></td>
                                <td><xsl:value-of select="isbn"/></td>
                                <td><xsl:value-of select="publisher"/></td>
                                <td><xsl:value-of select="edition"/></td>
                                <td><xsl:value-of select="price"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
