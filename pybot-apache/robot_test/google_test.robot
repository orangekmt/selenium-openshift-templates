*** Settings ***
Test Teardown     Close Browser
Test Timeout      60 minutes    # Security to exit a test after 60 minutes
Library           Selenium2Library
Library           OperatingSystem
Library           String
Library           DateTime
Library           Collections

*** Variables ***
${URL}            https://www.google.fr
${BROWSER}        ${EMPTY}
${SELENIUM_HOST}    ${EMPTY}
${SELENIUM_PORT}    ${EMPTY}
${SELENIUM_OS}    LINUX
${FF_PROFILE_DIR}   ${EMPTY}

*** Test Cases ***
01.Open_Google_fr
    [Tags]    1
    Open Browser    ${URL}    browser=${BROWSER}    remote_url=http://${SELENIUM_HOST}:${SELENIUM_PORT}/wd/hub    desired_capabilities=platform:${SELENIUM_OS}
    Maximize Browser Window
    Wait Until Page Contains    Google    10
