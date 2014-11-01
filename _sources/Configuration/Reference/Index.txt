
.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Reference
^^^^^^^^^

**TSconfig**

- mod.web\_txorphanfilesM1.

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         includeDeletedRecords

   Data type
         Boolean

   Description
         All deleted elements are ignored by default, since this extension is
         supposed to find only files which are not used anymore.

         If editors use the recycler you may use this option.

   Default
         0


.. container:: table-row

   Property
         showDeleteAllButton

   Data type
         Boolean

   Description
         Show a button to delete all orphaned files at once.

   Default
         0


.. container:: table-row

   Property
         showDeleteCheckbox

   Data type
         Boolean

   Description
         Show checkboxes instead of buttons to delete multiple files.

   Default
         0


.. container:: table-row

   Property
         clearCacheAfterDeletion

   Data type
         Boolean

   Description
         Clear the cache after deletions. Only activate if necessary.

   Default
         0


.. container:: table-row

   Property
         baseurl

   Data type
         String

   Description
         Use this URL to show a preview link to orphaned files. Something like
         » `http://example.com/ <http://example.com/>`_ «.

   Default
         (None)

.. container:: table-row

   Property
         crawl.[table]

   Data type
         Array

   Description
         Limit the search area to certain tables or fields (by default all
         tables and fields in TCA are searched, which can take a very long time
         and is rather lavish).

         **Syntax:**

         ::

            [table] = [field 1], [field 2]

         The field value is used in a select query, so use »\*« as asterisk or
         a list of field names.

         **Example:**

         ::

            crawl {
              tt_content = *
              pages = media
            }

   Default
         (None)

.. ###### END~OF~TABLE ######

Example
~~~~~~~

If you run into timeouts then you may want limit the search area. You
could use this configuration for a installation with TemplaVoila and
tt\_news:

::

   mod.web_txorphanfilesM1 {
       crawl.tt_content = *
       crawl.pages = *
       crawl.pages_language_overlay = *

       ### some extension tables
       crawl.tx_templavoila_tmplobj = *
       crawl.tt_news = *
       crawl.tt_news_cat = *
   }

Maybe this is still not enough, then narrow down the search even more
with a given set of fields. But watch out for flexform fields, the
extension is not able to find out where the associated DS definition
can be found (just search for »ds\_pointerField« in your configuration
and add all mentioned fields):

::

   mod.web_txorphanfilesM1 {
       ### everything after
       crawl.tt_content = image, media, header_link, image_link, bodytext, pi_flexform, tx_templavoila_flex, list_type, CType, tx_templavoila_ds
       crawl.pages = media, tx_templavoila_flex, tx_templavoila_ds, pid, tx_templavoila_next_ds
       crawl.pages_language_overlay = media

       crawl.tx_templavoila_tmplobj = previewicon, fileref
       crawl.tt_news = image, short, bodytext, news_files, links
       crawl.tt_news_cat = image
   }
