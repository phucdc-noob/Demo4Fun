
## Unreadable strings

```bash
strings unreadable_strings | grep -Po '^[A-Za-z0-9]*=$' | base64 -d | grep -Po 'FLAG{.*}'
```

![image](https://user-images.githubusercontent.com/82533607/154794113-2e596ce5-5868-4000-95cb-fd39deaa9dec.png)

## There is a base

```bash
tr -d [:space:] < there_is_a_base.txt | tr -s '[a-zA-Z0-9]' | base58 -d
```

![image](https://user-images.githubusercontent.com/82533607/154794825-7b2f850b-aaaf-4954-bb31-25e6eecb41b4.png)

## File finder

Thử `grep -R` để tìm tất cả nội dung của các file text bên trong đống thư mục chết tiệt, ta thấy một đống file có nội dung là 1 đường link Youtube nào đó:

```bash
grep -R '.*' Find_finder/
```

![image](https://user-images.githubusercontent.com/82533607/154795120-59d65d20-65d3-45d7-84da-40f54746d48c.png)

Để loại trừ các kết quả chứa link Youtube, ta sử dụng `-v` của `grep` để loại trừ các kết quả có chứa đường link dở hơi kia:

```bash
grep -Rv 'https' File_finder/
```

![image](https://user-images.githubusercontent.com/82533607/154795230-acad47a2-edbb-427b-ae7f-4a66636d2eda.png)

## Crack the 7z

```bash
#!/bin/bash

FILE='crackit.7z'

for pass in {0..9}{0..9}{0..9}{a..z}{a..z}
do
	printf '\b\b\b\b\b'
	printf "${pass}"
	7z x -aoa $FILE -p${pass} >/dev/null 2>/dev/null && printf '\b\b\b\b\b' && echo -e "Password is: ${pass}\n" && break
done

```

![image](https://user-images.githubusercontent.com/82533607/154795273-7cd7a3fc-0259-4a72-912b-5837ac1dfaca.png)

![image](https://user-images.githubusercontent.com/82533607/154795312-35f0fbfe-034c-4487-bae2-4e7f6ac209fa.png)

## Strong password

```bash
#!/bin/bash

GREEN='\033[32m'
RED='\033[31m'
ESC='\033[0m'

echo $1 | grep -Po '^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@$]).{8,24}$' | grep -P '^[A-Za-z0-9$@!]*$' > /dev/null && echo -e "${GREEN}Valid password${ESC}" && exit 0

echo -e "${RED}Invalid password${ESC}"
```

![image](https://user-images.githubusercontent.com/82533607/154795576-50b80492-230e-4c26-b447-0cb536ac57d7.png)