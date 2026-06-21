import React from 'react'

export default function AppButton({ textBtn, typeBtn, bgBtn, textColor, hoverBtn }) {
    return (
        <button type={typeBtn} className={`${bgBtn} ${textColor} px-4 py-2 rounded-sm cursor-pointer hover: font-bold w-full lg:max-w-max ${hoverBtn}`} >{textBtn}</button>
    )
}
