function insertBMIframe() {

	var iframeTag, iframeSrc, iframeStyle;
	var galleryLink = document.getElementById('bluemelongallery_galleryLink').value;
	var height = document.getElementById('bluemelongallery_height').value;
         
  if( galleryLink.indexOf( "bluemelon.com" ) == -1 )
  {
     alert( "Invalid gallery link!" );
     return;
  }   
  
  if( isNaN( height ) || height.length == 0 )
  {
     alert( "Insert integer value into height field!" );
     return;
  }         
  
  var index = galleryLink.indexOf( "bluemelon.com" );
  galleryLink = galleryLink.substring( index + 14 ); // first occurence of bluemelon.com + 14 characters ( 13 character + / ) is in bluemelon userurl
  
  if( galleryLink.length <= 5 )
  {
      alert( "Invalid user in gallery link!" );
      return;
  }
  
  var userurl = getUserurl ( galleryLink );
  iframeSrc = "http://www.bluemelon.com/iframe/home.seam?userurl=" + userurl;
  
  var folderurl = getFolderurl( galleryLink, userurl );
  if( folderurl != null )
  {
    iframeSrc += "&folderurl=" + folderurl;
    iframeSrc += "&rootUrl=" + folderurl;
  }
  
  iframeSrc += "&styleType=WORDPRESS";
  
   iframeTag = '[iframe: src="' + iframeSrc + '" width="100%" height="' + height + 'px" frameborder="0"]';
  
	window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, iframeTag);
	tinyMCEPopup.editor.execCommand('mceRepaint');
	tinyMCEPopup.close();
	return;
}

function getUserurl( src )
{
   var index = src.indexOf( "/" ); 
   
   if( index == -1 )
   {
      return src;
   }
   else
   {
      return src.substring( 0, index );
   }
}

function getFolderurl( link, username )
{
    var index = link.indexOf( username );
    link = link.substring( index + username.length );
 
    if( link.length < 2 )        // check whether folderurl is present
    {
      return null;
    }
    
    index = link.indexOf('#');
    
    if( index == -1 )
    {
        link = link.substring( 1 );
        
        index = link.indexOf('/');
        if( index != -1 )
        {
        	link = link.substring( 0, index );
        }
        
        return link;
    }
    else
    {
    	return link.substring( 1, index );
    }
}

