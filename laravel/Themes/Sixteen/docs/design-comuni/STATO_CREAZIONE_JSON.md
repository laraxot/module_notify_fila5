# 📝 Design Comuni - Stato Creazione Pagine JSON

**Data**: 2026-03-30  
**Stato**: In Corso  
**Totale**: 39 pagine

## ✅ Pagine Create (9/39)

### Generali (2/9)
- ✅ `tests.homepage.json` - Homepage
- ✅ `tests.argomenti.json` - Argomenti
- ⏳ `tests.argomento.json`
- ⏳ `tests.domande-frequenti.json`
- ⏳ `tests.risultati-ricerca.json`
- ⏳ `tests.lista-risorse.json`
- ⏳ `tests.lista-categorie.json`
- ⏳ `tests.lista-risorse-categorie.json`
- ⏳ `tests.mappa-sito.json`

### Amministrazione (1/2)
- ✅ `tests.amministrazione.json` - Amministrazione
- ⏳ `tests.documenti-dati.json`

### Novità (1/2)
- ✅ `tests.novita.json` - Novità
- ⏳ `tests.novita-dettaglio.json`

### Servizi (1/3)
- ✅ `tests.servizi.json` - Servizi
- ⏳ `tests.servizi-categoria.json`
- ⏳ `tests.servizio-dettaglio.json`

### Vivere il Comune (1/2)
- ✅ `tests.eventi.json` - Eventi
- ⏳ `tests.evento-dettaglio.json`

### Prenotazione Appuntamento (1/8)
- ✅ `tests.appuntamento-06-conferma.json` - Conferma (già esistente)
- ✅ `tests.appuntamento-01-ufficio.json` - Scelta ufficio
- ⏳ `tests.appuntamento-01-ufficio-luogo.json`
- ⏳ `tests.appuntamento-02-data-orario.json`
- ⏳ `tests.appuntamento-03-dettagli.json`
- ⏳ `tests.appuntamento-04-richiedente.json`
- ⏳ `tests.appuntamento-04-richiedente-autenticato.json`
- ⏳ `tests.appuntamento-05-riepilogo.json`

### Richiesta Assistenza (1/2)
- ✅ `tests.assistenza-01-dati.json` - Dati
- ⏳ `tests.assistenza-02-conferma.json`

### Segnalazione Disservizio (1/7)
- ✅ `tests.segnalazioni-elenco.json` - Elenco
- ⏳ `tests.segnalazione-dettaglio.json`
- ⏳ `tests.segnalazione-01-privacy.json`
- ⏳ `tests.segnalazione-02-dati.json`
- ⏳ `tests.segnalazione-03-riepilogo.json`
- ⏳ `tests.segnalazione-04-conferma.json`
- ⏳ `tests.segnalazione-area-personale.json`

## 📊 Riepilogo

| Categoria | Create | Da Fare | Totale |
|-----------|--------|---------|--------|
| Generali | 2 | 7 | 9 |
| Amministrazione | 1 | 1 | 2 |
| Novità | 1 | 1 | 2 |
| Servizi | 1 | 2 | 3 |
| Vivere il Comune | 1 | 1 | 2 |
| Prenotazione | 2 | 6 | 8 |
| Assistenza | 1 | 1 | 2 |
| Segnalazione | 1 | 6 | 7 |
| **TOTALE** | **9** | **30** | **39** |

## 📁 Posizione File

```
laravel/config/local/fixcity/database/content/pages/
├── tests.homepage.json                    ✅
├── tests.argomenti.json                   ✅
├── tests.servizi.json                     ✅
├── tests.novita.json                      ✅
├── tests.amministrazione.json             ✅
├── tests.eventi.json                      ✅
├── tests.appuntamento-01-ufficio.json     ✅
├── tests.appuntamento-06-conferma.json    ✅
├── tests.assistenza-01-dati.json          ✅
├── tests.segnalazioni-elenco.json         ✅
└── ... (30 da creare)
```

## 🎯 Prossime Pagine da Creare

### Priorità 1 - Pagine Principali
1. `tests.argomento.json` - Singolo argomento
2. `tests.servizio-dettaglio.json` - Dettaglio servizio
3. `tests.novita-dettaglio.json` - Dettaglio notizia
4. `tests.evento-dettaglio.json` - Dettaglio evento

### Priorità 2 - Flusso Appuntamento
5. `tests.appuntamento-02-data-orario.json`
6. `tests.appuntamento-03-dettagli.json`
7. `tests.appuntamento-04-richiedente.json`
8. `tests.appuntamento-05-riepilogo.json`

### Priorità 3 - Flusso Segnalazione
9. `tests.segnalazione-dettaglio.json`
10. `tests.segnalazione-01-privacy.json`
11. `tests.segnalazione-02-dati.json`
12. `tests.segnalazione-03-riepilogo.json`
13. `tests.segnalazione-04-conferma.json`

## 🔗 Test Pagine

Dopo aver creato i JSON, testare:
```
http://fixcity.local/it/tests/homepage
http://fixcity.local/it/tests/argomenti
http://fixcity.local/it/tests/servizi
http://fixcity.local/it/tests/novita
http://fixcity.local/it/tests/amministrazione
http://fixcity.local/it/tests/eventi
http://fixcity.local/it/tests/appuntamento-01-ufficio
http://fixcity.local/it/tests/assistenza-01-dati
http://fixcity.local/it/tests/segnalazioni-elenco
```

---

**Progresso**: 9/39 (23%)  
**Prossimo Step**: Creare le 30 pagine rimanenti
