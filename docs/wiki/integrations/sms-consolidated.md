---
title: "sms — Consolidated Documentation"
module: notify
type: integration
tags: [integrations, modules, notify]
created: 2026-08-24
updated: 2026-08-24
---

# sms — Consolidated Documentation

Consolidated from **63** individual files.

## Table of Contents

- [---](#sms-action-factory-analysis-1)
- [Analisi: Sostituzione Match con Formula nel SmsActionFactory](#sms-action-factory-analysis)
- [---](#sms-action-factory-resolution-1)
- [Risoluzione dinamica vs match esplicito in SmsActionFactory](#sms-action-factory-resolution)
- [Analisi: Sostituzione Match con Formula nel SmsActionFactory](#sms-action-factory)
- [Azioni SMS](#sms-actions-1)
- [---](#sms-actions-2)
- [Azioni SMS](#sms-actions)
- [---](#sms-best-practices-1)
- [Best Practices per l'Invio SMS](#sms-best-practices)
- [---](#sms-channel-action-resolution-1)
- [Dove posizionare la logica di risoluzione dell'action SMS?](#sms-channel-action-resolution)
- [Struttura della Configurazione SMS](#sms-config-structure-1)
- [---](#sms-config-structure-2)
- [Struttura della Configurazione SMS ](#sms-config-structure)
- [Pattern di Accesso alla Configurazione SMS](#sms-configuration-access)
- [Traduzioni SmsDriverEnum - Modulo Notify](#sms-driver-enum-translations-1)
- [---](#sms-driver-enum-translations-2)
- [Traduzioni SmsDriverEnum - Modulo Notify](#sms-driver-enum-translations)
- [---](#sms-driver-selection-analysis-1)
- [Analisi: Spostamento Logica Selezione Driver in SmsData](#sms-driver-selection-analysis)
- [---](#sms-driver-selection-specific-analysis-1)
- [Analisi Specifica: Validazione e Selezione Driver in SmsData](#sms-driver-selection-specific-analysis)
- [---](#sms-factor-data-implementation-1)
- [SmsFactorData Implementation Summary](#sms-factor-data-implementation)
- [SmsFactorData Implementation Summary](#sms-factorata-implementation)
- [---](#sms-global-vs-specific-params-1)
- [Parametri a Livello di Root vs Specifici per Provider nella Configurazione SMS](#sms-global-vs-specific-params)
- [---](#sms-implementation-1)
- [Implementazione SMS in Laravel](#sms-implementation)
- [SMS Integration](#sms-integration)
- [Integrazione Netfun SMS Channel in Laravel](#sms-netfun-channel-1)
- [---](#sms-netfun-channel-2)
- [Integrazione Netfun SMS Channel in Laravel](#sms-netfun-channel)
- [Deprecated](#sms-provider-configuration-1)
- [---](#sms-provider-configuration-2)
- [Best Practices per la Configurazione dei Provider SMS](#sms-provider-configuration-best-practices-1)
- [---](#sms-provider-configuration-best-practices-2)
- [Best Practices per la Configurazione dei Provider SMS](#sms-provider-configuration-best-practices)
- [Configurazione Corretta dei Provider SMS](#sms-provider-configuration)
- [Troubleshooting SMS](#sms-troubleshooting-1)
- [---](#sms-troubleshooting-2)
- [Troubleshooting SMS](#sms-troubleshooting)
- [sms skebby](#sms)
- [Analisi: Sostituzione Match con Formula nel SmsActionFactory](#sms_action_factory_analysis)
- [Risoluzione dinamica vs match esplicito in SmsActionFactory](#sms_action_factory_resolution)
- [Azioni SMS](#sms_actions)
- [Best Practices per l'Invio SMS](#sms_best_practices)
- [Dove posizionare la logica di risoluzione dell'action SMS?](#sms_channel_action_resolution)