<!--
Sprint 3, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 19.11.2015 Version 1
UserStory: Als Kunde möchte ich eine Größentabelle sehen können, um einschätzen zu können, ob ein Produkt passt.
Task: 220-1 (#10328) Größentabelle implementieren
Aufwand:  11 Stunden
Beschreibung: Größentabelle für Herren
View
-->
<main>
    <style>
/*        style für tabellen, wird noch ausgelagert*/
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
        }
    </style>

    <h2>Größentabelle Herren</h2>
    <br>
    <br>
    Alle Maße sollten eng am Körper gemessen werden. 
    Um die perfekte Größe für Hemden zu finden, sollten Sie darauf achten, 
    dass der Kragen gut passt. Nehmen Sie ein Hemd, das perfekt sitzt, 
    und messen Sie den Kragen von der Knopfmitte bis zum Ende des Knopflochs.
    <br>
    <br>
    - Der Brustumfang wird über der stärksten Stelle der Brust gemessen.
    <br>
    <br>
    - Die Taille wird an der schmalsten Stelle gemessen.
    <br>
    <br>
    - Der Hüftumfang wird über der stärksten Stelle der Hüften gemessen.
    <br>
    <br>
    - Die Schrittlänge wird zwischen Schritt und Boden gemessen.
    <br>
    <br>
<!--    Erste Tabelle -->
    <h3>Hemden</h3>
    <table>
        <tr>
            <th>   </th>
            <th>XS</th>
            <th>S</th>
            <th>M</th>
            <th>L</th>
            <th>XL</th>
            <th>XXL</th>
        </tr>
        
        <tr>
            <td>Größe/Halsweite</td>
            <td>35/36</td>
            <td>37/38</td>
            <td>39/40</td>
            <td>41/42</td>
            <td>43/44</td>
            <td>45/46</td>
        </tr>
        
        <tr>
            <td>Brustumfang</td>
            <td>80-84</td>
            <td>88-92</td>
            <td>96-100</td>
            <td>104-108</td>
            <td>112-116</td>
            <td>120-124</td>
        </tr>
        
        <tr>
            <td>Taillenumfang</td>
            <td>68-72</td>
            <td>76-80</td>
            <td>84-88</td>
            <td>92-96</td>
            <td>100-104</td>
            <td>108-112</td>
        </tr>
    </table>
    <br>
    <br>  
<!--    Beginn zweite Tabelle-->
    <h3>Hosen & Oberteile</h3>
    <table>
        <tr>
            <th>   </th>
            <th>XS</th>
            <th colspan="2">S</th>
            <th colspan="2">M</th>
            <th colspan="2">L</th>
            <th colspan="2">XL</th>
            <th colspan="2">XXL</th>
        </tr>
        <tr>
            <td>Größe</td>
            <td>42</td>
            <td>44</td>
            <td>46</td>
            <td>48</td>
            <td>50</td>
            <td>52</td>
            <td>54</td>
            <td>56</td>
            <td>58</td>
            <td>60</td>
            <td>62</td>
        </tr>
       
        <tr>
            <td>Brustumfang</td>
            <td>84</td>
            <td>88</td>
            <td>92</td>
            <td>96</td>
            <td>100</td>
            <td>104</td>
            <td>108</td>
            <td>112</td>
            <td>116</td>
            <td>120</td>
            <td>124</td>
        </tr>
        
        <tr>
            <td>Taillenumfang</td>
            <td>72</td>
            <td>76</td>
            <td>80</td>
            <td>84</td>
            <td>88</td>
            <td>92</td>
            <td>96</td>
            <td>100</td>
            <td>104</td>
            <td>108</td>
            <td>112</td>
        </tr>
        
        <tr>
            <td>Hüftumfang</td>
            <td>88</td>
            <td>92</td>
            <td>96</td>
            <td>100</td>
            <td>104</td>
            <td>108</td>
            <td>112</td>
            <td>116</td>
            <td>120</td>
            <td>124</td>
            <td>128</td>
        </tr>
        
        <tr>
            <td>Schrittlänge</td>
            <td>79</td>
            <td>80</td>
            <td>81</td>
            <td>82</td>
            <td>83</td>
            <td>84</td>
            <td>85</td>
            <td>86</td>
            <td>87</td>
            <td>88</td>
            <td>89</td>
        </tr>
    </table>
    <br>
    <br>
<!--    Begin für Tabelle Jeans-->
    <h3>Jeans</h3>
    <br>
    Jeansgrößen werden meist in Inch angegeben, z. B. 30/32. 
    Die erste Ziffer gibt die Bundweite an, die zweite die Schrittlänge.
    <br>
    <table>
        <tr>
            <th>    </th>
            <th colspan="2">XS</th>
            <th colspan="3">S</th>
            <th colspan="3">M</th>
            <th colspan="2">L</th>
            <th>XL</th>
        </tr>
        
        <tr>
            <td>Inch-Größen</td>
            <td>26"</td>
            <td>27"</td>
            <td>28"</td>
            <td>29"</td>
            <td>30"</td>
            <td>31"</td>
            <td>32"</td>
            <td>33"</td>
            <td>34"</td>
            <td>36"</td>
            <td>38"</td>
        </tr>
    </table>
    <br>
    <br>
</main>





