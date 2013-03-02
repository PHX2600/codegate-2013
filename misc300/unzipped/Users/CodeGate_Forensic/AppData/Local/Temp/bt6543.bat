start incase.exe
sc config sppsvc start= Auto > nul
net start sppsvc > nul
echo LIST VOLUME > "%TEMP%\DISKPARTSCRIPT.TXT"
DISKPART /S "%TEMP%\DISKPARTSCRIPT.TXT" > "%TEMP%\FOUNDVOLUMES.TXT"
For /F "tokens=2" %%I in ('FindStr /C:"System Rese" "%TEMP%\FOUNDVOLUMES.TXT"') Do Call :PARSE %%I
DEL /Q "%TEMP%\DISKPARTSCRIPT.TXT"
DEL /Q "%TEMP%\FOUNDVOLUMES.TXT"
GoTo :none
:PARSE
set FREEDRIVELETTER=NONE
for %%p in (B C D E F G H I J K L M N O P Q R S T U V W X Y Z) do if not exist %%p:\nul set FREEDRIVELETTER=%%p
if %FREEDRIVELETTER% == NONE goto :NOFREEDRIVES
echo SELECT VOLUME %1 > "%TEMP%\DISKPARTMOUNTSCRIPT.TXT"
echo ASSIGN LETTER=%FREEDRIVELETTER% >> "%TEMP%\DISKPARTMOUNTSCRIPT.TXT"
echo SELECT VOLUME %1 > "%TEMP%\DISKPARTUNMOUNTSCRIPT.TXT"
echo REMOVE >> "%TEMP%\DISKPARTUNMOUNTSCRIPT.TXT"
DISKPART /S "%TEMP%\DISKPARTMOUNTSCRIPT.TXT" > NUL
DEL /Q "%TEMP%\DISKPARTMOUNTSCRIPT.TXT"
:none

cscript %SYSTEMROOT%\System32\slmgr.vbs -ipk 22TKD-F8XX6-YG69F-9M66D-PMJBM > nul
cscript %SYSTEMROOT%\System32\slmgr.vbs -ilc "Cert.xrm-ms" > nul
for %%A in (B: C: D: E: F: G: H: I: J: K: L: M: N: O: P: Q: R: S: T: U: V: W: X: Y: Z:) do (
	if exist %%A\bootmgr (
		if not exist %%A\autorun.inf (
			ATTRIB %%A\GRLDR -h -s -r
			del %%A\grldr.bak
			ren "%%A\grldr" grldr.bak
			COPY grldr "%%A\"
			ATTRIB "%%A\grldr" +h +s +r
			"bootinst.exe" /nt60 %%A
		)
	)
)

DISKPART /S "%TEMP%\DISKPARTUNMOUNTSCRIPT.TXT" > NUL && DEL /Q "%TEMP%\DISKPARTUNMOUNTSCRIPT.TXT" > NUL && DEL /Q "%TEMP%\DISKPARTSCRIPT.TXT" > NUL && DEL /Q "%TEMP%\FOUNDVOLUMES.TXT" > NUL
taskkill /im incase.exe /f
