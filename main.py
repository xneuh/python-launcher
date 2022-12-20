import requests as req
import subprocess 

hwid = str(subprocess.check_output('wmic csproduct get uuid'), 'utf-8').split('\n')[1].strip()
phpInfo = ["localhost", "license.php"] # phpInfo = ["serverIp", "fileName.php"]

def main():
    licenseKey = input("License: ")
    if(licenseKey != ""):
        phpResponse = req.get("http://" + phpInfo[0] + "/" + phpInfo[1] + "?key=" + licenseKey + "&type=CheckLicense&hwid=" + hwid)
        responseString = str(phpResponse.content)
        if(responseString.find(hwid) >= 1):
            print("successfully logged in")
        else:
            print(responseString)
    else:
        main()


main()
