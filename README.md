<a href="http://athirarddevweb.epizy.com/"> <img src="assets/img/chien1.jpg" titre="portfolio" alt="portfolio">   </a>

*** Exercice de mise en ligne d'un projet Ajax via Git ***

# AJOUT D'ARTICLES FAVORIS
> des articles apparaissent pour l'utilisateur.
Au clic l'article est ajouter au favoris via la session. Los du déclic, l'icone favoris disparait et l'article est enlevé de la session.

> Tech: AJAX, JS, PHP

** N'oubliez pas de ... **
- Si vous souhaitez lier à une BDD; créez votre fichier d'init dans le dossier inc
- Les articles apparaissent en dur dans notre index. Veuillez les remplacer par les vôtres.

> Ajout de notre GIF [![LES FAVORIS SELON LES CATS](https://media.giphy.com/media/VbnUQpnihPSIgIXuZv/giphy.gif)]()

## Table des matières 

- [Explication](#explication)
- [Remerciement](#remerciement)

---
## Explication
---

> Ajout d'une portion de code dans le README

```PHP
//retrait des favoris en session
if(isset($_POST['a'])){
    if(in_array($id, $_SESSION['favorite']) && $_POST['a']=="remove"){
        unset($_SESSION['favorite'][$id]);
    }
}

```
- Pour retirer les favoris de ma session je regarde bien que l'action demandée est un "remove" 
- Je fais concorder le $id envoyé en POST avec les valeurs enregistrées en session

---
## Remerciement
---

A tous les étudiants !
[![Veuillez visitez notre site ](https://media.giphy.com/media/CjmvTCZf2U3p09Cn0h/giphy.gif)](http://athirarddevweb.epizy.com/)