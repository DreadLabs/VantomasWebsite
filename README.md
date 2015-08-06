# VantomasWebsite

[![Build Status](https://travis-ci.org/DreadLabs/VantomasWebsite.svg?branch=master)](https://travis-ci.org/DreadLabs/VantomasWebsite)
[![Coverage Status](https://coveralls.io/repos/DreadLabs/VantomasWebsite/badge.svg)](https://coveralls.io/r/DreadLabs/VantomasWebsite)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4cc6c4a9-95b9-4cbb-a047-ee578d989188/mini.png)](https://insight.sensiolabs.com/projects/4cc6c4a9-95b9-4cbb-a047-ee578d989188)
[![Code Climate](https://codeclimate.com/github/DreadLabs/VantomasWebsite/badges/gpa.svg)](https://codeclimate.com/github/DreadLabs/VantomasWebsite)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/DreadLabs/VantomasWebsite/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/DreadLabs/VantomasWebsite/?branch=master)

This repository contains all necessary domain and core logic to build the
website www.van-tomas.de

## Motivation

Currently, my website is based upon the Open Source Content Management System "TYPO3 CMS".

While the first versions of my website were very tightly coupled to the CMS API, this library
should serve as a learning platform for practising Domain Driven Design.

During refactoring, extracting and writing tests more and more domain specific aspects emerge
from the "big ball of mud".

The goal is to have as much code on the domain side to achieve the big goal: replace the CMS
with another one without pain. The first tests with the CMS "Bolt" were very promising: replace
the graphics layer of TYPO3.CMS with WideImage, integrate Swiftmailer without any wrappers etc.

## Domain

Currently, the domain contains of the following topics:

| Topic         | Description                                                                                 |
|---------------|---------------------------------------------------------------------------------------------|
| Archive       | Generate a list of month/year date ranges, each linking to a list of pages within the range | 
| Disqus        | Provide a service to the Disqus API                                                         |
| Event         | Collect events which will be published and subscribed to within the application process     |
| EventListener | Collect all event listeners which can be used within the application                        |
| Form          | Forms and form objects used on the site                                                     |
| Http          | Interfaces and adapters for HTTP communication for the API services                         |
| Mail          | Abstraction layer for application dependent mail systems and wrappers                       |
| Media         | Media abstraction                                                                           |
| Migration     | Abstraction and adapters for integration of migrations during application runtime           |
| Page          | The main aspect for CMS: pages group content elements / blocks                              |
| RssFeed       | Rss feed generation specific aspects                                                        |
| SecretSanta   | A secret santa implementation for my family                                                 |
| Sitemap       | sitemap.xml generation specific aspects                                                     |
| Taxonomy      | Tag handling for the blog                                                                   |
| TeaserImage   | Abstraction to how the teaser image can be generated for the blog article detail views      |
| Twitter       | Provide a service to the Twitter API                                                        |
| User          | Abstraction to the application user / authentication facilities                             |
