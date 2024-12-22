from bs4 import BeautifulSoup
import requests

def scrape_heading():
    # URL target
    url = "https://www.traveloka.com/en-id/hotel/search?spec=23-12-2024.24-12-2024.1.1.HOTEL_GEO.107217.Raja%20Ampat%20Regency.1"
    
    # Melakukan permintaan HTTP
    response = requests.get(url, headers={
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36"
    })
    
    # Periksa apakah permintaan berhasil
    if response.status_code != 200:
        print(f"Permintaan gagal dengan status code: {response.status_code}")
        return

    # Parsing HTML
    soup = BeautifulSoup(response.content, "html.parser")

    # Mencari elemen <h2> dengan atribut class tertentu
    heading = soup.find("div", class_="css-901oao r-a5wbuh r-b88u0q r-1ff274t")
    
    # Memeriksa apakah elemen ditemukan
    if heading:
        print("Teks ditemukan:", heading.text)
    else:
        print("Elemen <h2> tidak ditemukan.")

def main():
    scrape_heading()

if __name__ == "__main__":
    main()
